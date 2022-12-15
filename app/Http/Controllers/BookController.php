<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required|max:255',
            'halaman' => 'required|max:100',
            'kategori' => '',
            'penerbit' => 'required|max:100'
        ];

        $validated = $request->validate($rules);

        Book::create($validated);

        $request->session()->flash('success', "Berhasil menambahkan buku baru yang berjudul {$validated['judul']}");
        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $rules = [
            'judul' => 'required|max:255',
            'halaman' => 'required|max:100',
            'kategori' => '',
            'penerbit' => 'required|max:100'
        ];

        $validated = $request->validate($rules);

        $book->update($validated);

        $request->session()->flash('success', "Berhasil memperbarui data buku yang berjudul {$validated['judul']}");
        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', "Berhasil menghapus data film {$book['title']}");
    }
}
