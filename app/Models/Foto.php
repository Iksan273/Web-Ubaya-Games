<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $table = 'fotos';
    protected $fillable = [
        'nama',
        'nrp',
        'kontingen',
        'foto1_kategori1',
        'foto2_kategori1',
        'foto3_kategori1',
        'foto4_kategori1',
        'foto5_kategori1',
        'foto1_kategori2',
        'foto2_kategori2',
        'foto3_kategori2',
        'foto4_kategori2',
        'foto5_kategori2',
    ];
}
