<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'isbn',
        'cover_img',
        'category_id',
        'publisher_id',
        'description',
        'publish_year',
        'nbr_of_copies',
        'nbr_of_pages',
        'price'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function publisher() {
        return $this->belongsTo(Publisher::class);
    }

    public function authors() {
        return $this->belongsToMany(Author::class, 'book_author');
    }
}
