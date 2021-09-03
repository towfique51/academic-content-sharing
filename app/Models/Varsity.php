<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varsity extends Model
{
    use HasFactory;
    protected $fillable = ['name','short_name','slug'];
    protected $guarded = ['name'];

    public function depts()
    {

        return $this->belongsToMany(Department::class, 'varsity_dept', 'varsity_id', 'dept_id');
    }

    public function posts(){
        return $this->hasMany(Post::class,'varsity_id','id')->orderBy('views','DESC');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
