<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = "reservas";

    protected $primaryKey = "id";

    protected $fillable = [
        "id_cliente",
        "id_invitado",
        "id_menu",
        "id_mesa",
        "num_tarjeta",
        "fecha_reserva",
        "num_personas",
    ];

    public function cliente(){
        return $this->belongsTo(User::class);
    }

    public function invitado(){
        return $this->belongsTo(Invitado::class);
    }

    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    public function mesa(){
        return $this->belongsTo(Mesa::class);
    }

    public function horario(){
        return $this->belongsTo(Horario::class);
    }
}
