<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Nama class diubah menjadi singular: Borrow
class Borrow extends Model
{
    use HasFactory;

    protected $table = 'borrows';
    protected $fillable = ['tanggal_peminjaman', 'tanggal_kembali', 'books_id', 'users_id'];

    // Nama relasi diubah agar lebih standar
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // TAMBAHAN: Relasi ke model Book
    public function book()
    {
        // Pastikan nama model di sini juga singular: Book::class
        return $this->belongsTo(Book::class, 'books_id');
    }
}
