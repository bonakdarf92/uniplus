<?php

use Illuminate\Database\Seeder;
use App\Models\award;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        award::create([
            'title' => "سیم کارت رایگان",
            'score' => "10",
            'active' => "1",
        ]);
        award::create([
            'title' => "سفر رایگان اسنپ",
            'score' => "10",
            'active' => "1",
        ]);
        award::create([
            'title' => "30 درصد تخفیف آزمون پارسه",
            'score' => "20",
            'active' => "1",
        ]);
        award::create([
            'title' => "30 درصد ساندویچ هرکول",
            'score' => "20",
            'active' => "1",
        ]);
        award::create([
            'title' => "30 درصد mr potato",
            'score' => "30",
            'active' => "1",
        ]);
        award::create([
            'title' => "50 درصد mr potato",
            'score' => "40",
            'active' => "1",
        ]);
    }
}
