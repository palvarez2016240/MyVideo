<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    //Relacion uno a muchos inversa

    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion muchos a muchos
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
