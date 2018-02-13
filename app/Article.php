<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    //
    // Mass assigned
    protected $fillable = ['title', 'slug', 'description', 'meta_title', 'meta_description', 'meta_keyword','image', 'published', 'created_by', 'modified_by'];

    //Polymorphic relations with categories
    public  function categories () {
        return $this->morphToMany('App\Category', 'categoryable');
    }

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    public function scopePublished($query) {
            return $query->where('published', 1)->orderby('created_at', 'desc')->take(5);
    }
}
