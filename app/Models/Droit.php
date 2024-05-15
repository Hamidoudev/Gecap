<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Droit extends Model
{
    protected $guarded =[];
    protected $table = "droits";
    use HasFactory;

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function type_droit(){
        
        return $this->belongsTo(TypeDroit::class);
    }
}
