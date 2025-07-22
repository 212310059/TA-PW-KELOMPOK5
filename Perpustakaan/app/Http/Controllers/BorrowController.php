<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::paginate(12);
        return view('books.tampil', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.tambah', compact('categories'));
    }

    public function store(Request $request)
    {
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
            'title' => $request->title,
            'summary' => $request->summary,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'image' => $imageName,
        ]);

        return redirect()->route('books.index')->with('success', 'Buku baru berhasil ditambahkan!');
    }

    public function show(Book $book)
    {
        return view('books.detail', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
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

        return redirect()->route('books.index')->with('success', 'Data buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        if ($book->borrows()->count() > 0) {
            return redirect()->route('books.index')->with('error', 'Buku tidak dapat dihapus karena memiliki riwayat peminjaman.');
        }

        if ($book->image && File::exists(public_path('uploads/'.$book->image))) {
            File::delete(public_path('uploads/'.$book->image));
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
