<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\city_university;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {
        $this->call([
            CityTableSeeder::class,
            CategorySeeder::class,
            ActionSeeder::class,
            AwardSeeder::class
        ]);
        User::create([
          'phone' => '09119442539',
           'otp' => '85964',
           'role' => 2
      ]);
        User::create([
            'phone' => '09124734024',
            'otp' => '52478',
            'role' => 2
        ]);
    }
}
