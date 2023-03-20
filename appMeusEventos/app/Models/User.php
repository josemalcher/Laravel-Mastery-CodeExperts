<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

// Representa a ligação entre o Model User e Model Profile e indica que user tem um profile
    public function profile()
    {
        // automaticamente procura por esta coluna: user_id em profiles
        // return $this->hasOne(Profile::class, 'usuario_id'); // ex com nome diferente
        return $this->hasOne(Profile::class);
    }

    public function events()
    {
            return $this->hasMany(Event::class, 'owner_id');
    }

    public function tickets()
    {
        return $this->belongsToMany(Event::class)
            // ->as('tickets') // mudar o nome da chave pivot - Representa a tabela intermediaria
            ->withPivot('reference', 'status');
    }
}
