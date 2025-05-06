<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TesteModels extends Model
{
    //defirnir qual table deseja usar
    protected $table = 'phones';

    // definir qual chave primaria
    protected $primaryKey = 'id';
}
