<?php

use Illuminate\Database\Seeder;
use App\Models\category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        category::create([
            'id' => "1",
            'name' => "کتاب",
        ]);
        category::create([
            'id' => "2",
            'name' => "وسایل",
        ]);
        category::create([
            'id' => "3",
            'name' => "همسفر",
        ]);
        category::create([
            'id' => "4",
            'name' => "پروژه",
        ]);
        category::create([
            'id' => "5",
            'name' => "هم خونه",
        ]);
        category::create([
            'id' => "6",
            'name' => "تدریس",
        ]);

    }
}
