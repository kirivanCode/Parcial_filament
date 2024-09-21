<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion'];

    public function clients()
    {
        return $this->hasMany(clients::class, 'id');
    }
}