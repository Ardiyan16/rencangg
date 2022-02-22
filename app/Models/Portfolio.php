<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';
    protected $fillabel = ['judul', 'kategori', 'tahun', 'deskripsi', 'image'];
    use HasFactory;
}
