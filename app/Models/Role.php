<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded =[];
    use HasFactory;

    public function droits(){
        return $this->belongsToMany(Droit::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
