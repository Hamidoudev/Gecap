<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploisMatiere extends Model
{
    use HasFactory;
    protected $table = 'emplois_matieres';
    protected $guarded = [];

    public function enseignant()
    {
        $this->belongsTo(Enseignant::class);
    }

    public function emplois()
    {
        return $this->belongsTo(Emplois::class);
    }
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

}
