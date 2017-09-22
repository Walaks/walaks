<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sobre extends Model
{
    protected $fillable = [
        'nome',
        'cargo',
        'descricao',
        'imagem'
    ];

    public $createRules = [
        'nome' => 'max:255',
        'cargo' => 'max:255|',
        'descricao' => '',
        'imagem' => 'required|max:255'
    ];
    
    public $editRules = [
        'nome' => 'max:255',
        'cargo' => 'max:255|'
    ];
}
