<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bookshelf extends Model
{
    use HasFactory;

    protected $table = 'bookshelfs';

    protected $fillable = ['code', 'name'];

    /**
     * Relasi: Satu Rak memiliki banyak Buku
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class, 'bookshelf_id');
    }
}