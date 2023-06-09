<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Traitments\ImageUploadTrait;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ImageUploadTrait;

    public function index()
    {
        $books = Book::all();

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        $publishers = Publisher::all();

        return view('admin.books.create', compact('categories', 'authors', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'isbn' => ["required", 'alpha_num', Rule::unique('books', 'isbn') ],
            'cover_img' => 'image|required',
            'category' => 'nullable',
            'authors' => 'nullable',
            'publisher_id' => 'nullable',
            'description' => 'nullable',
            'publish_year' => 'numeric|nullable',
            'nbr_of_copies' => 'numeric|required',
            'nbr_of_pages' => 'numeric|required',
            'price' => 'numeric|required'
        ]);

        
        $book = Book::create([
            'category_id' => $request->category_id,
            'publisher_id' => $request->publisher_id,
            'title' => $request->title,
            'isbn' => $request->isbn,
            'description' => $request->description,
            'publish_year' => $request->publish_year,
            'nbr_of_copies' => $request->nbr_of_copies,
            'nbr_of_pages' => $request->nbr_of_pages,
            'price' => $request->price,
            'cover_img' => $this->uploadImg($request->cover_img)
        ]);

        $book->authors()->attach($request->authors);

        session()->flash('flash_message', 'تمت إضـافة الكتـاب بنجاح');

        return redirect(route('books.show', $book->id));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        $authors = Author::all();
        $publishers = Publisher::all();

        return view('admin.books.edit', compact('book','categories', 'authors', 'publishers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'title' => 'required',
            'isbn' => ["required", 'alpha_num', Rule::unique('books', 'isbn') ],
            'cover_img' => 'image',
            'category' => 'nullable',
            'authors' => 'nullable',
            'publisher_id' => 'nullable',
            'description' => 'nullable',
            'publish_year' => 'numeric|nullable',
            'nbr_of_copies' => 'numeric|required',
            'nbr_of_pages' => 'numeric|required',
            'price' => 'numeric|required'
        ]);

        if ($request->has('cover_img')) {
            Storage::disk('public')->delete($book->cover_img);
            $book->cover_img = $this->uploadImg($request->cover_img);
        }

        $book->update([
            'category_id' => $request->category_id,
            'publisher_id' => $request->publisher_id,
            'title' => $request->title,
            'isbn' => $request->isbn,
            'description' => $request->description,
            'publish_year' => $request->publish_year,
            'nbr_of_copies' => $request->nbr_of_copies,
            'nbr_of_pages' => $request->nbr_of_pages,
            'price' => $request->price,
        ]);

        $book->authors()->detach();

        $book->authors()->attach($request->authors);

        session()->flash('flash_message', 'تمت تعديـل الكتـاب بنجاح');

        return redirect(route('books.show', $book->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        Storage::disk('public')->delete($book->cover_img);
        
        $book->delete();

        session()->flash('flash_message', 'تم حـذف الكتـاب بنجـاح');

        return redirect('admin/books/');
    }

    public function details(Book $book) {
        return view('books.details', compact('book'));
    }
}
