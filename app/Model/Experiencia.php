<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    protected $fillable = [
        'nome',
        'periodo',
        'cargo',
        'descricao',
        'url',
        'imagem'
    ];

    public $createRules = [
        'nome' => 'required|max:255',
        'periodo' => 'required|max:255',
        'cargo' => 'max:255',
        'url' => 'max:255',
        'imagem' => 'required'
    ];
    
    public $editRules = [
        'nome' => 'required|max:255',
        'periodo' => 'required|max:255',
        'cargo' => 'max:255',
        'url' => 'max:255'
    ];
}
