<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $table = "contacto";

    protected $primaryKey = "id";

    protected $fillable = [
        "nombre",
        "email",
        "telefono",
        "asunto",
        "mensaje",
    ];
}
