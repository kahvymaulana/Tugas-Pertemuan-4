<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title', 
        'author', 
        'year', 
        'publisher', 
        'city', 
        'cover', 
        'bookshelf_id'
    ];

    /**
     * Relasi: Buku ini dimiliki oleh sebuah Rak
     */
    public function bookshelf(): BelongsTo
    {
        return $this->belongsTo(Bookshelf::class, 'bookshelf_id');
    }
}