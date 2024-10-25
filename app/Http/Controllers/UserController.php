<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request) // menampilkan akun
    {
        $users = User::where('name', 'LIKE', '%' .$request->search_name . '%')->orderBy('name', 'ASC')->simplePaginate(5);
        return view('user.data', compact('users')); // compact () untuk mengirim data ke view (isinya sama dengan $)
    }

    public function create() // menampilkan tambah akun
    {
        return view('user.tambah');
        // memanggil file blade
        // ('') -> name file blade, tambah nama file
    }
    public function store(Request $request) // untuk proses tambah akun
    {

        $request->validate([
            'name' => "required",
            'email' => "required",
            'role' => "required",
            'password' => "required",
        ]);
       User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // untuk mengenskripsi data
            'role' => $request->role,

        ]);
        return redirect()->route('akun.data')->with('success', 'Berhasil menambahkan data user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $users = User::where('id', $id)->first();
        return view('user.edit', compact ('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validasi input tanpa password
    $request->validate([
        'name' => 'required', // required -> harus diisi
        'email' => 'required',
        'password' => 'nullable',
        'role' => 'required',
    ]);

    // Ambil user berdasarkan ID
    $user = User::findOrFail($id);

    // Update fields
    $user->name = $request->name;
    $user->email = $request->email;
    $user->role = $request->role;

    // Simpan perubahan
    $user->save();

    return redirect()->route('akun.data')->with('success', 'Berhasil mengupdate data user');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deleteData = User::where('id', $id)->delete();

        if ($deleteData) {
            return redirect ()->back()->with('success',  'Berhasil menghapus data akun');
        } else {
            return redirect ()->back()->with('error', 'Gagal menghapus data akun');
        }
    }
    

}