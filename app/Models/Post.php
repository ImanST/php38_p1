<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;


    protected $guarded =[];
    protected $with=['tags','catogories'];

// Mutators
    public function setSlugAttribute($value){
        $this->attributes['slug']=Str::slug($this->attributes['title']);
    }

// Relations
    public function author(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function image()
    {
        return $this->hasOne(Image::class);
    }


}
