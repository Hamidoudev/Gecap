<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grille extends Model
{
    use HasFactory;
    protected $fillable = [
        'prenom',
        'statut',
        'ecole',
        'classe_tenue',
        'discipline',
        'theme',
        'duree',
        'nom',
        'effectif',
        'fiche_preparation', // Ajoutez des champs pour chaque item de la grille
        'materiel_didactique',
        'utilisation_materiel',
        'opo_annonces',
        'methode_pertinente',
        'eleves_activite',
        'contenu_conforme',
        'contenu_maitrise',
        'techniques_animation',
        'exercices_evaluation',
        'total_points',
    ];
}
