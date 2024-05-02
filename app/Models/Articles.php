<?php

namespace App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasSlug;

    protected $table = 'articles';
    protected $fillable = [
        'title',
        'slug',
        'text',
        'like',
        'body',
        'view_count',
        'car_id',
        'category_id'
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

    public function car()
    {
        // hasOne один к одному.
        // hasMany  один ко многим
        return $this->hasOne(Cars::class, 'id', 'car_id');
    }

    public function category()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

}
