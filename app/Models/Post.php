<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'body', 'metadescription', 'metatag', 'user_id','varsity_id','department_id','course_id'];
    protected $types = [
        'lab' => 'App\Model\Lab',
    ];

    public function postable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function varsity()
    {
        return $this->belongsTo(Varsity::class, 'varsity_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getImageableTypeAttribute($type)
    {
        // transform to lower case
        $type = strtolower($type);

        // to make sure this returns value from the array
        return Arr::get($this->types, $type, $type);

        // which is always safe, because new 'class'
        // will work just the same as new 'Class'
    }
    public function postView()
    {
        return $this->hasMany(PostView::class);
    }
    public function showPost()
    {
        if (auth()->id() == null) {
            return $this->postView()
                ->where('ip', '=',  request()->ip())->exists();
        }
        return $this->postView()->where(function ($postViewsQuery) {
                $postViewsQuery
                    ->where('session_id', '=', request()->getSession()->getId())
                    ->orWhere('user_id', '=', (auth()->check()));
            })->exists();
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
