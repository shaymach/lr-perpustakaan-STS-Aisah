<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('buku.index', compact('books'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'penulis' => 'required|max:100',
            'penerbit' => 'required|max:100',
        ]);

        Book::create($request->all());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dibuat!');
    }

    public function show($id) // Ganti menjadi $id
    {
        $book = Book::findOrFail($id); // Ambil buku berdasarkan ID
        return view('buku.detail', compact('book')); // Kirim buku ke view
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id); // Ambil buku berdasarkan ID
        return view('buku.edit', compact('book')); // Kirim buku ke view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'penulis' => 'required|max:100',
            'penerbit' => 'required|max:100',
        ]);

        $book = Book::findOrFail($id); // Ambil buku berdasarkan ID
        $book->update($request->all()); // Update buku
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id); // Ambil buku berdasarkan ID
        $book->delete(); // Hapus buku
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }
}
