<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estados extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nombre', 'descripcion'];

    public function clients(){
        return $this->hasMany(clients::class, 'id');
    }
}