<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'email',
        'total_price',
        'status',
    ];

    public function books(){
        return $this->belongsToMany(Book::class)->withPivot('quantity', 'unit_price');
    }
}
