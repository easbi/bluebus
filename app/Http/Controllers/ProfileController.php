<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use DB;

class ProfileController extends Controller
{
    /**
     * Display a list of all admins.
     */
    public function index(): View
    {
        // Pastikan hanya admin yang bisa mengakses
        if (Auth::user()->id !== 1) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
        $drivers = User::all(); 
        return view('admin.driver', compact('drivers'))->with('i');;
    }


    public function create()
    {
        return view('admin.drivercreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'no_hp_wa' => 'nullable|string|max:15',
            'tgl_bergabung' => 'nullable|date',
            'status_driver' => 'required|in:AKTIF,NON-AKTIF',
            'password' => 'required|confirmed|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp_wa' => $request->no_hp_wa,
            'tgl_bergabung' => $request->tgl_bergabung,
            'status_driver' => $request->status_driver,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.driver')->with('success', 'Driver berhasil ditambahkan.');
    }


    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Show the form to edit a specific admin.
     */
    public function editAdmin($id): View
    {
        $driver = User::findOrFail($id); // Cari admin berdasarkan ID
        return view('admin.driveredit', compact('driver'));
    }

    /**
     * Update the admin's information.
     */
    public function updateAdmin(Request $request, $id): RedirectResponse
    {
        $admin = User::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'no_hp_wa' => 'nullable|string|max:15',
            'tgl_bergabung' => 'nullable|date',
            'status_driver' => 'nullable|string|max:100',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = \Hash::make($request->password);
        } else {
            unset($validated['password']); 
        }

        // Update data admin
        $admin->update($validated);

        return redirect()->route('admin.driver')->with('status', 'Admin berhasil diperbarui.');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
