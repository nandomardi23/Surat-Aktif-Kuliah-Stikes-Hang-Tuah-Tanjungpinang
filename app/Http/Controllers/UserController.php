<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(5);

        return view('pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|email'
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back()->with('success', 'Data User Berhasil Di Simpan!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', 'Data User Berhasil Dihapus!!!');
    }

    public function resetPassword(Request $request, User $user)
    {

        // Set password baru sama dengan email user
        $newPassword = $user->email; // Password baru = email user
        $user->password = Hash::make($newPassword);
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'Password berhasil direset. Password baru sama dengan email user.');
    }
}
