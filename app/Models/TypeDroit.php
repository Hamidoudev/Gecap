<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDroit extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table = 'type_droits';

    public function droits(){
        
        return $this->hasMany(Droit::class);
    }
}


