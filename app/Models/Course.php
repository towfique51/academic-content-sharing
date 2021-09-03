<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
    use HasFactory;

    protected $fillable = ['name','course_code','slug','course_credit'];

    public function depts(){
        return $this->belongsToMany(Department::class,'dept_course','course_id','dept_id');
    }

    public function prerequisite()
    {
        return $this->belongsToMany(Course::class,'course_prerequisite','course_id','course_prerequisite_id');
    }

    public function labs(){
        return $this->hasMany(Lab::class,'course_id','id');
    }

    public function books(){
        return $this->hasMany(Book::class,'course_id','id');
    }

    public function assignments(){
        return $this->hasMany(Assignment::class,'course_id','id');
    }

    public function assessments(){
        return $this->hasMany(Assessment::class,'course_id','id');
    }

    public function notes(){
        return $this->hasMany(Note::class,'course_id','id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function posts(){
        return $this->hasMany(Post::class,'course_id','id')->orderBy('views','DESC');
    }
}
