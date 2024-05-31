<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'username', 'password', 'profile_picture',
    ];

  

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array

     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array

     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
{
    return new Attribute(
        get: function ($value) {
            $types = ["user", "admin", "manager"];
            // Assurez-vous que $value est dans la plage de 0 à 2
            if (array_key_exists($value, $types)) {
                return $types[$value];
            } else {
                return "Indéfini";
            }
        }
    );
}

  public function role(){
    return $this->belongsTo(Role::class);
  }

  public function role_type_user()
  {
    return $this->belongsTo(RoleTypeUser::class);
  }
}
