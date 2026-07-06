<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    public function books(){
        return $this->hasMany(Book::class);
    }
}
