<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoanDetail extends Model
{
    use HasFactory;

    protected $table = 'loan_details';

    protected $fillable = [
        'loan_id',
        'book_id',
        'is_return',
    ];

    /**
     * Relasi: Detail ini milik sebuah transaksi Loan
     */
    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class, 'loan_id');
    }

    /**
     * Relasi: Detail ini mencatat sebuah Buku
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}