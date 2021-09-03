<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    public function courses(){
        return $this->belongsTo(Course::class);
    }
    public function posts()
    {
        return $this->morphMany(Post::class, 'postable');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function next(){
        // get next 
        return $this->where('id', '>', $this->id)->orderBy('id','desc')->first();
    
    }
    public  function previous(){
        // get previous 
        return $this->where('id', '<', $this->id)->orderBy('id','desc')->first();
    
    }
}
