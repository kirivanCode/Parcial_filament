<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nombre', 'mail', 'telf', 'category_id', 'estado_id'];

    public function categories(){
        return $this->belongsTo(categories::class, 'category_id');
    }
    public function estados(){
        return $this->belongsTo(estados::class, 'estado_id');
}
}