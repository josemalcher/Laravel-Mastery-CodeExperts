<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
      'about',
      'phone',
      'social_networks'
    ];

    public function user()
    {
        //por conta do nome do método que a coluna é user_id
        return $this->belongsTo(User::class);
    }
}
