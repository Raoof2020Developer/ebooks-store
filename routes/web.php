<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/search', [GalleryController::class, 'search'])->name('search');
Route::get('/book/{book}', [BooksController::class, 'details'])->name('book.details');

Route::get('/categories', [CategoriesController::class, 'list'])->name('categories');
Route::get('/categories/search', [CategoriesController::class, 'search'])->name('categories.search');
Route::get('/categories/{category}', [CategoriesController::class, 'result'])->name('gallery.categories.show');

Route::get('/publishers', [PublishersController::class, 'list'])->name('publishers');
Route::get('/publishers/search', [PublishersController::class, 'search'])->name('publishers.search');
Route::get('/publishers/{publisher}', [PublishersController::class, 'result'])->name('gallery.publishers.show');

Route::get('/authors', [AuthorsController::class, 'list'])->name('authors');
Route::get('/authors/search', [AuthorsController::class, 'search'])->name('authors.search');
Route::get('/authors/{author}', [AuthorsController::class, 'result'])->name('gallery.authors.show');


Route::prefix('/admin')->middleware('can:update-books')->group(function() {
    Route::get('/', [AdminsController::class, 'index'])->name('admin.index');
    Route::resource('/books', BooksController::class);
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/publishers', PublishersController::class);
    Route::resource('/authors', AuthorsController::class);
    Route::resource('/users', UsersController::class)->middleware('can:update-users');
});