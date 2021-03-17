<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cor',
        'placa',
        'ano',
        'modelo',
    ];

    public $fieldValidations = [
        'cor' => 'required',
        'placa' => 'required',
        'ano' => 'required',
        'modelo' => 'required',
    ];
}
