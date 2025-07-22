<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category; // Pastikan baris ini ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $books = Book::paginate(12);
        return view('books.tampil', ["books" => $books]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.tambah', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        // ... sisa fungsi tidak perlu diubah ...
        $request->validate([
            "image" => 'required|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required',
            'summary' => 'required',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        Book::create([
            'title' => $request->input("title"),
            'summary' => $request->input("summary"),
            'stock' => $request->input("stock"),
            'category_id' => $request->input("category_id"),
            'image' => $imageName,
        ]);

        return redirect('/books')->with('success', 'Buku baru berhasil ditambahkan!');
    }

    public function show(Book $book)
    {
        return view('books.detail', ['book' => $book]);
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', ['book' => $book, 'categories' => $categories]);
    }

    public function update(Request $request, Book $book)
    {
        // ... sisa fungsi tidak perlu diubah ...
        $request->validate([
            "image" => 'nullable|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required',
            'summary' => 'required',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required',
        ]);

        $updateData = $request->except('image');

        if ($request->hasFile('image')) {
            if ($book->image && File::exists(public_path('uploads/'.$book->image))) {
                File::delete(public_path('uploads/'.$book->image));
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $updateData['image'] = $imageName;
        }

        $book->update($updateData);

        return redirect('/books')->with('success', 'Data buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        // ... sisa fungsi tidak perlu diubah ...
        if ($book->borrows()->count() > 0) {
            return redirect('/books')->with('error', 'Buku tidak dapat dihapus karena memiliki riwayat peminjaman.');
        }

        if ($book->image && File::exists(public_path('uploads/'.$book->image))) {
            File::delete(public_path('uploads/'.$book->image));
        }

        $book->delete();

        return redirect('/books')->with('success', 'Buku berhasil dihapus.');
    }
}
