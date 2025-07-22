<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $fillable = ['name'];

    // Nama relasi diubah menjadi plural standar: books
    public function books()
    {
        // Pastikan nama model di sini juga singular: Book::class
        return $this->hasMany(Book::class, 'category_id');
    }
}
