<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'direccion'
    ];

    public function productos()
    {
        return $this->belongsToMany('App\Models\Producto');
    }
}
