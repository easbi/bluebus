<?php

namespace App\Http\Controllers;

use App\Models\Sprintj;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class SpjController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->id != 1) {
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
        $spj =  DB::table('spj')->leftjoin('users', 'spj.driver_id', 'users.id')->select('spj.*', 'users.name')->orderBy('id', 'desc')->get();
        
        return view('admin.spj.index', compact('spj'))->with('i');
    }

    public function index2()
    {
        if (auth()->user()->id != 1) {
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
        $spj =  DB::table('spj')
            ->join('booking', 'spj.booking_id', 'booking.id')
            ->leftjoin('users', 'booking.created_by', 'users.id')
            ->select('spj.*', 'users.name as order_name', 'booking.created_by AS orderan_driver')
            ->get();

        $driverOrders = $spj->groupBy('order_name')->map(function ($group) {
            return $group->count(); // Hitung jumlah orderan per driver
        });

        // dd($driverOrders);
        
        return view('admin.driver.index', ['driverOrders' => $driverOrders])->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Booking $booking)
    {
        // Cek apakah booking_id sudah ada di tabel Sprintj
        $existingTransaction = Sprintj::where('booking_id', $booking->id)->first();

        if ($existingTransaction) {
            // Jika sudah ada, berikan pesan error dan kembali ke halaman sebelumnya
            return redirect()->back()->with('error', 'SPJ data ini sudah ada, tidak perlu dibuat lagi. Silahkan cek tabel SPJ!');
        }
        // Buat nomor SPJ unik, misalnya dengan format SPJ-{timestamp}-{id booking}
        $noSpj = 'SPJ-' . time() . '-' . $booking->id;

        // Salin data dari tabel booking ke tabel transaksi
        $transaksi = Sprintj::create([
            'booking_id' => $booking->id,
            'no_spj' => $noSpj, 
            'tgl_spj' => date('Y-m-d'), 
            'nama_pemesan' => $booking->nama_pemesan,
            'no_hp_wa' => $booking->no_hp_wa,
            'lokasi_tujuan' => $booking->lokasi_tujuan,
            'lokasi_jemput' => $booking->lokasi_jemput,
            'tanggal_penjemputan' => $booking->tanggal_penjemputan,
            'tanggal_kembali' => $booking->tanggal_kembali,            
            'bus_id' => $booking->tipe_bus,
            'driver_id' => $booking->created_by,
            'lama_sewa' => (strtotime($booking->tanggal_kembali) - strtotime($booking->tanggal_penjemputan)) / (60 * 60 * 24) + 1,
            'created_by' => Auth::user()->id,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('spj.index')
                         ->with('success', 'Data berhasil disalin ke tabel transaksi dengan No SPJ: ' . $noSpj);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sprintj  $sprintj
     * @return \Illuminate\Http\Response
     */
    public function show(Sprintj $sprintj)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sprintj  $sprintj
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        if (auth()->user()->id !== 1) {
            return redirect('/')->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }

        $sprintj = Sprintj::where('id', $id)->first();
        $users = User::select('id', 'name')->where('status_driver', '!=', 'NON-AKTIF')->get();
        $bus_type = DB::table('bus_type')->select('id', 'armada')->get();

        return view('admin.spj.edit', compact('sprintj', 'users', 'bus_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sprintj  $sprintj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_spj' => 'required',
            'tgl_spj' => 'required',
            'nama_pemesan' => 'required|string|max:255',
            'no_hp_wa' => 'required|string|max:15',
            'tujuan' => 'required|string|max:255',
            'lokasi_jemput' => 'required|string|max:250',
            'tanggal_penjemputan' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_penjemputan',
            'bus_id' => 'required',
            'driver_id' => 'required',
            'lama_sewa' => 'required',
            'tarif_sewa' => 'required',
            'down_payment' => 'required',
            'jml_setoran' => 'required',
            'tgl_setoran' => 'required',
        ]);

        $sprintj = Sprintj::findOrFail($id);

        $sprintj->update([  
            'no_spj' => $validated['no_spj'],
            'tgl_spj' => $validated['tgl_spj'],     
            'nama_pemesan' => $validated['nama_pemesan'],
            'no_hp_wa' => $validated['no_hp_wa'],
            'lokasi_tujuan' => $validated['tujuan'],
            'lokasi_jemput' => $validated['lokasi_jemput'],
            'tanggal_penjemputan' => $validated['tanggal_penjemputan'],
            'tanggal_kembali' => $validated['tanggal_kembali'],
            'driver_id' => $validated['driver_id'],
            'bus_id' => $validated['bus_id'],
            'tarif_sewa' => $validated['tarif_sewa'],
            'lama_sewa' => $validated['lama_sewa'],
            'down_payment' => $validated['down_payment'],
            'jml_setoran' => $validated['jml_setoran'],
            'tgl_setoran' => $validated['tgl_setoran'],
        ]);

        $sprintj->save();

        // Redirect dengan pesan sukses
        return redirect()->route('spj.index')
                         ->with('success', 'Data SPJ berhasil diperbarui.');
    }

    public function exportToExcel()
    {
         $spjData = DB::table('spj')
            ->leftjoin('users', 'spj.driver_id', 'users.id')
            ->leftjoin('bus_type', 'bus_type.id', 'spj.bus_id')
            ->select('spj.*', 'users.name as driver_name', 'bus_type.armada AS armada')
            ->get();

        // Buat Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Atur header kolom
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Booking ID');
        $sheet->setCellValue('C1', 'No SPJ');
        $sheet->setCellValue('D1', 'Tanggal SPJ');
        $sheet->setCellValue('E1', 'Nama Pemesan');
        $sheet->setCellValue('F1', 'No HP/WA');
        $sheet->setCellValue('G1', 'Lokasi Tujuan');
        $sheet->setCellValue('H1', 'Lokasi Jemput');
        $sheet->setCellValue('I1', 'Tanggal Penjemputan');
        $sheet->setCellValue('J1', 'Tanggal Kembali');
        $sheet->setCellValue('K1', 'Driver');
        $sheet->setCellValue('L1', 'Jenis Bus');
        $sheet->setCellValue('M1', 'Lama Sewa');
        $sheet->setCellValue('N1', 'Tarif Sewa');
        $sheet->setCellValue('O1', 'Down Payment');
        $sheet->setCellValue('P1', 'Jumlah Setoran');
        $sheet->setCellValue('Q1', 'Tanggal Setoran');

        // Gaya untuk header
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4CAF50'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ];

        $sheet->getStyle('A1:Q1')->applyFromArray($headerStyle);

        // Masukkan data ke baris berikutnya
        $row = 2;
        $i = 1;
        foreach ($spjData as $spj) {
            $sheet->setCellValue("A{$row}", $i);
            $sheet->setCellValue("B{$row}", $spj->booking_id);
            $sheet->setCellValue("C{$row}", $spj->no_spj);
            $sheet->setCellValue("D{$row}", $spj->tgl_spj);
            $sheet->setCellValue("E{$row}", $spj->nama_pemesan);
            $sheet->setCellValue("F{$row}", $spj->no_hp_wa);
            $sheet->setCellValue("G{$row}", $spj->lokasi_tujuan);
            $sheet->setCellValue("H{$row}", $spj->lokasi_jemput);
            $sheet->setCellValue("I{$row}", $spj->tanggal_penjemputan);
            $sheet->setCellValue("J{$row}", $spj->tanggal_kembali);
            $sheet->setCellValue("K{$row}", $spj->driver_name);
            $sheet->setCellValue("L{$row}", $spj->armada);
            $sheet->setCellValue("M{$row}", $spj->lama_sewa);
            $sheet->setCellValue("N{$row}", $spj->tarif_sewa);
            $sheet->setCellValue("O{$row}", $spj->down_payment);
            $sheet->setCellValue("P{$row}", $spj->jml_setoran);
            $sheet->setCellValue("Q{$row}", $spj->tgl_setoran);
            $row++;
            $i++;
        }

        // Atur ukuran kolom otomatis
        foreach (range('A', 'Q') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Berikan nama file dan download
        $fileName = 'spj_data.xlsx';
        $writer = new Xlsx($spreadsheet);

        // Set response untuk download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"{$fileName}\"");
        $writer->save('php://output');
        exit;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sprintj  $sprintj
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sprintj = Sprintj::findOrFail($id);
        $sprintj->delete();
        return redirect()->route('spj.index')
                         ->with('success', 'Data SPJ berhasil dihapus.');
    }

}
