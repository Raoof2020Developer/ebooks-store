<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'nullable'
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        session()->flash('flash_message', 'تمت إضـافة التصنيـف بنجـاح');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        session()->flash('flash_message', 'تمت تعديـل التصنيـف بنجـاح');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category = Category::findOrFail($category->id);

        if ($category) {
            $category->delete();

            session()->flash('flash_message', 'تم حذف التصنيف بنجـاح');
        }

        return redirect(route('categories.index'));
    }

    public function result(Category $category) {
        $books = $category->books()->paginate(12);
        $title = 'الكتـب التابعـة للتصنيـف: ' . $category->name;
        return view('gallery', compact('books', 'title'));
    }

    public function list() {
        $categories = Category::all()->sortBy('name');
        $title = 'التصنيـفات';
        return view('categories.index', compact('categories', 'title'));
    }

    public function search(Request $request) {
        $categories = Category::where('name', 'like', "%{$request->term}%")->paginate(10);
        $title = 'نتائج البحث عن التصنيـف: '. $request->term;
        return view('categories.index', compact('categories', 'title'));
    }
}
