<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Esport extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kontingen',
        'fakultas',
        'file',
    ];
}
