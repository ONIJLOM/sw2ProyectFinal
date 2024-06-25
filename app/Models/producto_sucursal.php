<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto_sucursal extends Model
{
    use HasFactory;
    protected $fillable = [
        'producto_id',
        'sucursal_id'
    ];
}
