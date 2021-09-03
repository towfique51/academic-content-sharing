<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{

    use HasFactory;
    protected $fillable=['name','slug','course_id'];
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->morphMany(Post::class, 'postable');
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
