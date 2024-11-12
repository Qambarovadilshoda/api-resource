<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'price',
        'description'
    ] ;
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
