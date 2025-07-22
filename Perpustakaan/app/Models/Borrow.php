<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $table = 'borrows';
    protected $fillable = ['tanggal_peminjaman', 'tanggal_kembali', 'books_id', 'users_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'books_id');
    }
}
