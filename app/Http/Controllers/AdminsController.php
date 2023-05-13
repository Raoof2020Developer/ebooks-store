<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index() {
        $nbr_of_books = Book::count();
        $nbr_of_categories = Category::count();
        $nbr_of_publishers = Publisher::count();
        $nbr_of_authors = Author::count();

        return view('admin.index', compact('nbr_of_books', 'nbr_of_categories', 'nbr_of_publishers', 'nbr_of_authors'));
    }

}
