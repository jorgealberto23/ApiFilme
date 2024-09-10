<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblFilme extends Model
{
    use HasFactory;

    protected $primaryKey = 'codigo';
    protected $fillable = [
        "nomeFilme",
        "generoFilme",
        "classificacaoFilme",
        "anoFilme",
        "codigoEmpresafk"
    ];
}
