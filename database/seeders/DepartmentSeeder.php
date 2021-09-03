<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Department;
use App\Models\Varsity;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Course::factory()->count(10)->create();
        $courses=Course::all();

        Department::all()->each(function ($department) use ($courses) { 
            $department->courses()->attach(
                $courses->random(rand(1, 2))->pluck('id')->toArray()
            ); 
        });
    }
}
