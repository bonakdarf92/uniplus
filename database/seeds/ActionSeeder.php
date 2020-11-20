<?php

use Illuminate\Database\Seeder;
use App\Models\action;
class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        action::create([
            'title' => "register",
            'score' => "10",
            'active' => "1",
        ]);
        action::create([
            'title' => "add_user",
            'score' => "5",
            'active' => "1",
        ]);
        action::create([
            'title' => "add_adv",
            'score' => "5",
            'active' => "1",
        ]);
        action::create([
            'title' => "fill_profile",
            'score' => "5",
            'active' => "1",
        ]);
    }
}
