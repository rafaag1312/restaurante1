<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = "horarios";

    protected $primaryKey = "id";

    protected $fillable = [
        "fecha",
        "hora",
        "estado",
    ];

    public function reserva(){
        return $this->hasOne(Reserva::class, "id");
    }
}
