<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Event extends Model
{
    use HasFactory, HasSlug;
    protected $fillable = [
        'title',
        'description',
        'body',
        'slug',
        'start_event',
        'banner'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    protected $dates = ['start_event'];

   /* public function getTitleAttribute()
    {
        return 'Evento: ' . $this->attributes['title'];
    }*/

//    public function getStartEventAttribute() // coluna: start_event
//    {
//        // return 'Evento: ' . $this->attributes['title'];
//    }

    public function getOwnerNameAttribute()
    {
        return !$this->owner() ? 'Organizador Não encontrado' : $this->owner->name;
    }

    /*
     * Mutators
     *
     */
/*    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        $this->attributes['slug'] = Str::slug($value);
    }*/

    public function setStartEventAttribute($value)
    {
        $this->attributes['start_event'] = (\DateTime::createFromFormat('d/m/Y H:i', $value)
            ->format('Y-m-d H:i'));
    }


    public function photos()
    {
        return $this->hasMany(Photo::class);// event_id
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);

    }
    public function enrolleds() // Users
    {
        return $this->belongsToMany(User::class)
            ->withPivot('reference', 'status');
    }


    /* Outros methods */
    public function getEventsHome($byCategory = null)
    {
        $events = $byCategory ? $byCategory : $this->orderBy('start_event', 'DESC');

        $events->when($search = request()->query('s'), function ($queryBuilder) use ($search){
            return $queryBuilder->where('title', 'LIKE', '%' . $search . '%');
        });

        // $events->whereRaw('DATE(start_event) >= DATE(NOW())'); // pode dar problemas com outros bancos..etc!

        $events->whereDate('start_event', '>=', now());

        return $events;
    }
}
