<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cep extends Model
{
    use HasFactory;

    protected $table = 'cep';

    protected $primaryKey = 'cep';

    protected $fillable = [
        'cep',
        'localidade',
        'bairro',
        'logradouro',
        'uf'
    ];

    public $timestamps = false;
}
