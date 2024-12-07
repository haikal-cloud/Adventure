<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admins', [
            "title" => "Admin",
            "admins" => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:users,email'
        ]);

        User::create([
            'name' => $validatedData['email'],
            'email' => $validatedData['email'],
            'password' => bcrypt(Str::random(8)),
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::findOrFail($id);

        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus');
    }
}
