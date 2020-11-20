<?php

use Illuminate\Database\Seeder;
use App\Models\city_university;
class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        city_university::create([
            'city' => "شاهرود",
            'university' => "صنعتی شاهرود",
        ]);
        city_university::create([
            'city' => "شاهرود",
            'university' => "آزاد واحد شاهرود",
        ]);
        city_university::create([
            'city' => "شاهرود",
            'university' => "علوم پزشکی شاهرود",
        ]);
        city_university::create([
            'city' => "شاهرود",
            'university' => "پیام نور شاهرود",
        ]);
        city_university::create([
            'city' => "شاهرود",
            'university' => "برآیند شاهرود",
        ]);
        city_university::create([
            'city' => "شاهرود",
            'university' => "فنی حرفه ای شاهرود",
        ]);
/*        city_university::create([
            'city' => "سمنان",
            'university' => "سمنان",
        ]);
        city_university::create([
            'city' => "سمنان",
            'university' => "علوم پزشکی سمنان",
        ]);
        city_university::create([
            'city' => "سمنان",
            'university' => "آزاد واحد سمنان",
        ]);*/

    }
}
