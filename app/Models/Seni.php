<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seni extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kontingen',
        'fakultas',
        'cabang',
        'file',
        'status',
        'revisi',
    ];

    protected $attributes = [
        'status' => 'pending',
        'revisi' => '-',
    ];
}
