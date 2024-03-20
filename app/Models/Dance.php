<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dance extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kontingen',
        'fakultas',
        'file',
    ];
}
