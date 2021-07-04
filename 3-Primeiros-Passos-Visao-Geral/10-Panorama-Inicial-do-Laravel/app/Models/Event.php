<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'body',
        'start_event',
        'slug'
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
