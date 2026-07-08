<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Editor extends Model
{
    use HasSlug;
    
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
    }

    public function books(){
        return $this->hasMany(Book::class);
    }

    #[Override]
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
