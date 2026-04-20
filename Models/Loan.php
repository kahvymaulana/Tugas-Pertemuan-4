<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';

    protected $fillable = [
        'user_npm',
        'loan_at',
        'return_at',
    ];

    /**
     * Relasi: Peminjaman ini dimiliki oleh seorang User (Mahasiswa)
     */
    public function user(): BelongsTo
    {
        // Menghubungkan user_npm di tabel loans ke npm di tabel users
        return $this->belongsTo(User::class, 'user_npm', 'npm');
    }

    /**
     * Relasi: Satu peminjaman bisa berisi beberapa buku (lewat detail)
     */
    public function details(): HasMany
    {
        return $this->hasMany(LoanDetail::class, 'loan_id');
    }
}