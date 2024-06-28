<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $table = 'enseignants';
    public function matieres()
    {
        return $this->belongsToMany(Matiere::class);
    }
    //protected $primaryKey = 'id';
  //  protected $foreignKey = '';
   // protected $fillable = ['nom','prenom','date_n','email','telephone','adresse','cv'];
}
