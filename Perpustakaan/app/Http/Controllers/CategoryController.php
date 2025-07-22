<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('category.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect('/category')->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    public function index()
    {
        $categories = Category::all();
        return view('category.tampil', ['categories' => $categories]);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('category.detail', ['category' => $category]);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', ['category' => $category]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect('/category')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Cek apakah ada buku yang terkait dengan kategori ini
        if ($category->books()->count() > 0) {
            // Jika ada, kembalikan dengan pesan error
            return redirect('/category')->with('error', 'Kategori tidak dapat dihapus karena masih digunakan oleh beberapa buku.');
        }

        // Jika tidak ada buku terkait, lanjutkan proses hapus
        $category->delete();

        return redirect('/category')->with('success', 'Kategori berhasil dihapus.');
    }
}
