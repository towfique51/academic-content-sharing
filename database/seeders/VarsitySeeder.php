<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Varsity;
use Illuminate\Database\Seeder;

class VarsitySeeder extends Seeder
{

    public function randomArray($max,$arraysize){
        $random_number_array = range(1, $max);
        shuffle($random_number_array );
        return array_slice($random_number_array ,0,$arraysize);
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Varsity::factory()->count(10)->create();
        Department::factory()->count(10)->create();
        $departments=Department::all();
        Varsity::all()->each(function ($varsity) use ($departments) { 
            $varsity->depts()->attach(
                $departments->random(rand(1, 2))->pluck('id')->toArray()
            ); 
        });

    }
}
