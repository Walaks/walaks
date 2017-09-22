<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $fillable = [
        'titulo',
        'subtitulo'
    ];

    public $createRules = [
        'titulo' => 'required|max:255|',
        'subtitulo' => 'max:255|'
    ];
}
