<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnseignantMatiere extends Model
{
    public function matieres(){
        return $this->belongsToMany(Matiere::class);
    }
    public function enseignant(){
        return $this->belongsToMany(Enseignant::class);
    }
    use HasFactory;
}
