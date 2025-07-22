<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Nama class diubah menjadi singular: Book
class Book extends Model
{
    use HasFactory;

    protected $table = "books";
    protected $fillable = ['title', 'summary', 'image', 'stock', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Nama relasi diubah menjadi plural standar: borrows
    public function borrows()
    {
        // Pastikan nama model di sini juga singular: Borrow::class
        return $this->hasMany(Borrow::class, 'books_id');
    }
}
