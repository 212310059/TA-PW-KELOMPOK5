<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Mengambil data untuk statistik
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $userCount = User::count();

        // Mengirim data ke view 'home'
        return view('home', compact('bookCount', 'categoryCount', 'userCount'));
    }
}
