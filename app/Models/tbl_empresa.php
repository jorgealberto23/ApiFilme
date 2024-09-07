<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_empresa extends Model
{
    use HasFactory;
    protected $primaryKey = 'codigo';
    protected $fillable = [
        "nomeEmpresa",
        "donoEmpresa",
        "anoEmpresa",
    ];
}
