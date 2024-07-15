<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Ecole extends Authenticatable
{
    protected $guard = [];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function typeecole()
    {
        return $this->belongsTo(typeEcole::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
