<?php

namespace App\Http\Controllers\Staf;

use App\Http\Controllers\Controller; 
use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('staf.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Roles::all();
        return view('staf.user.create', compact('roles'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'telepon' => 'required|numeric|digits_between:10,15|unique:users,telepon',
        'password' => 'required|confirmed|min:8',
        'alamat' => 'required|string|max:50',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
    ]);

    $validatedData['password'] = Hash::make($validatedData['password']);
    $validatedData['idRole'] = 2;
    
    User::create($validatedData);
    $notification = array(
        'message' => 'Data User berhasil ditambahkan',
        'alert-type' => 'success'
    );
    return redirect()->route('user.index')->with($notification);
}

public function edit($id)
{
    $user = User::findOrFail($id);
    $roles = Roles::all();
    return view('staf.user.edit', compact('user', 'roles'));
}


public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'telepon' => 'required|numeric|digits_between:10,15',
        'alamat' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'password' => 'nullable|confirmed|min:8',
    ]);

    if ($request->filled('password')) {
        $validated['password'] = Hash::make($request->password);
    } else {
        unset($validated['password']);
    }

    User::where('id', $id)->update($validated);

    return redirect()->route('user.index')->with([
        'message' => 'Data User berhasil diperbaharui',
        'alert-type' => 'success',
    ]);
}

public function destroy(string $id)
{
    $user = User::findOrFail($id);
    $user->delete();

    $notification = array(
        'message' => 'Akun berhasil dihapus',
        'alert-type' => 'success'
    );

    return redirect()->route('user.index')->with($notification);
}

}
