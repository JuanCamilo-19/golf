<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampoGolf extends Model
{
     protected $fillable = ['nombre', 'ubicacion', 'numero_hoyos'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
