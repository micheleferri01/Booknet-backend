<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Genre extends Model
{
    use HasSlug;

    public function getSlug()
    {
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
    }

    #[Override]
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function books(){
        return $this->belongsToMany(Book::class);
    }
}
