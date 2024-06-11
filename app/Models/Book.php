<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'published_year',
        'category',
    ];

    public function borrowings()
    {
        return $this->hasMany(BorrowingRecord::class);
    }
}