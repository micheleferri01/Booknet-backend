<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Book extends Model
{
    use HasSlug;

    public function getSlug(){
        return SlugOptions::create()->generateSlugsFrom('title')->saveSlugsTo('slug');
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function editor(){
        return $this->belongsTo(Editor::class);
    }

    #[Override]
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
