<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    protected $table = "mesas";

    protected $primaryKey = "id";

    protected $fillable = [
        "asientos",
    ];

    public function reserva(){
        return $this->hasMany(Reserva::class, "id");
    }
}
