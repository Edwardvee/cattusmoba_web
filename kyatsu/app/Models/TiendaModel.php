<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiendaModel extends Model
{
    use HasFactory;
    protected $table = 'tienda';
    protected $info = [
        'id',
       'name',
       'description',
       'quantity',
       'unit_price',
       'created_at',
       'updated_at',
       'deleted_at'
    ];
}
