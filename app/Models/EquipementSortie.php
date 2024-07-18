<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipementSortie extends Model
{
    use HasFactory;
    protected $table ='sortieequipent';
    protected $guarded = [];

    public function equipement()
    {
        return $this->belongsTo(Equipement::class);
    }

    public function ecole()
    {
        return $this->belongsTo(Ecole::class);
    }
}
