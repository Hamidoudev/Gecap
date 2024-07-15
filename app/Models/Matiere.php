<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{

    use HasFactory;

    public function enseignants()
    {
        return $this->belongsToMany(Enseignant::class);
    }
    public function cycles()
    {
        return $this->belongsTo(Cycle::class);
    }
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function ensegnant_matiere()
    {
        return $this->belongsTo(EnseignantMatiere::class);
    }
}
