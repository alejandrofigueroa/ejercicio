<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperante extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_cooperante', 'email_cooperante', 'direccion_cooperante'];
}
