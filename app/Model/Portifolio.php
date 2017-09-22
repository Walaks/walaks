<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Portifolio extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'url',
        'imagem'
    ];

    public $createRules = [
        'nome' => 'required|max:255',
        'url' => 'max:255',
        'imagem' => 'required'
    ];

    public $editRules = [
        'nome' => 'required|max:255',
        'url' => 'max:255'
    ];
}
