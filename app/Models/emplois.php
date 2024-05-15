<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emplois extends Model
{
    use HasFactory;
    protected $table = 'emplois';

    public function ue()
    {
        return $this->belongsTo(ue::class, 'ue_id');
    }

    public function trimestre()
    {
        return $this->belongsTo(trimestre::class, 'trimestre_id');
    }
}
