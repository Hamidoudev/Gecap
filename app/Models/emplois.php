<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emplois extends Model
{
    use HasFactory;
    protected $fillable = [
        'classe_id',
        'matiere_id',
        'cycle_id',
        'enseignant_id',
        'jour',
        'heure',
    ];
    protected $table = 'emplois';

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    public function matiere()
    {
        return $this->belongsTo(matiere::class);
    }
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }
}
