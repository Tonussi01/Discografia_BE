<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disco extends Model
{
    use HasFactory;

    // Especifica os campos que podem ser preenchidos em massa
    protected $fillable = ['nome', 'descricao', 'imagem_url'];
}
