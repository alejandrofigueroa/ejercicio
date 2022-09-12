<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacione extends Model
{
    use HasFactory;

    protected $fillable = ['cooperante_id', 'proyecto_id', 'fecha_asignacion', 'monto'];
}
