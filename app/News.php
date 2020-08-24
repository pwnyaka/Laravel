<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'text', 'isPrivate', 'category_id', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }
}
