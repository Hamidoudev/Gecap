<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;
    public function emplois(){

        return $this->BelongsToMany(Emplois::class);
    }
    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }
}
