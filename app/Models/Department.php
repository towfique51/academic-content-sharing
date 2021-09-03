<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['name','short_name','slug'];
    protected $guarded = ['dean'];

    public function varsity(){
        return $this->belongsToMany(Varsity::class,'varsity_dept','dept_id','varsity_id');
    }

    public function posts(){
        return $this->hasMany(Post::class,'department_id','id')->orderBy('views','DESC');
    }

    public function courses(){
        return $this->belongsToMany(Course::class,'dept_course','dept_id','course_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
