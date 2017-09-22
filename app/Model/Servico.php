<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = [
        'icone',
        'titulo',
        'descricao'
    ];

    public $createRules = [
        'icone' => 'required|max:255',
        'titulo' => 'required|max:255',
        'descricao' => 'max:255|'
    ];
}
