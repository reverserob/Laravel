<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'first_name' => 'Roberta',
        'last_name' => 'Randazzo',
        'slug' => 'roberta.randazzo',
        'email' => 'hey@helloroberta.com',
        'password' => \Hash::make('123456')
        ]);

      User::create([
        'first_name' => 'Paolo',
        'last_name' => 'Rossi',
        'slug' => 'paolo_rossi',
        'email' => 'hey@paolorossi.com',
        'password' => \Hash::make('654321')
        ]);
    }
}
