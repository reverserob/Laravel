<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = array(
            [
                'id' => 1,
                'name' => 'Ortopedia',
                'email' => 'ortopedia@villasofia.it',
                'password' => Hash::make('Ortopedia01'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'admin' => 1
            ],
            [
                'id' => 2,
                'name' => 'RandazzoA',
                'email' => 'randazzo@villasofia.it',
                'password' => Hash::make('Rand02'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'admin' => 1
            ],
            [
                'id' => 3,
                'name' => 'BelliaL',
                'email' => 'bellia@villasofia.it',
                'password' => Hash::make('Bellia03'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'admin' => 0
            ],
            [
                'id' => 4,
                'name' => 'DiGirolamoF',
                'email' => 'digirolamo@villasofia.it',
                'password' => Hash::make('Digirolamo04'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'admin' => 0
            ],
            [
                'id' => 5,
                'name' => 'GiulianaV',
                'email' => 'giuliana@villasofia.it',
                'password' => Hash::make('Giuliana05'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'admin' => 0
            ],
            [
                'id' => 6,
                'name' => 'JacobsA',
                'email' => 'jacobs@villasofia.it',
                'password' => Hash::make('Jacobs06'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'admin' => 0
            ],
            [
                'id' => 7,
                'name' => 'LoPrestiR',
                'email' => 'lopresti@villasofia.it',
                'password' => Hash::make('Lopresti07'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'admin' => 0
            ],
            [
                'id' => 8,
                'name' => 'MaggioM',
                'email' => 'maggio@villasofia.it',
                'password' => Hash::make('Maggio08'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'admin' => 0
            ],
            [
                'id' => 9,
                'name' => 'MartoranaL',
                'email' => 'martorana@villasofia.it',
                'password' => Hash::make('Martorana09'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'admin' => 0
            ],
            [
                'id' => 10,
                'name' => 'MatraciaR',
                'email' => 'matracia@villasofia.it',
                'password' => Hash::make('Matracia010'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'admin' => 0
            ],
            [
                'id' => 11,
                'name' => 'MoscaM',
                'email' => 'mosca@villasofia.it',
                'password' => Hash::make('Mosca011'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'admin' => 0
            ],
            [
                'id' => 12,
                'name' => 'PalazzoloP',
                'email' => 'palazzolo@villasofia.it',
                'password' => Hash::make('Palazzolo012'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'admin' => 0
            ],
            [
                'id' => 13,
                'name' => 'PiricoV',
                'email' => 'pirico@villasofia.it',
                'password' => Hash::make('Pirico013'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'admin' => 0
            ],
            [
                'id' => 14,
                'name' => 'SalamoneA',
                'email' => 'salamone@villasofia.it',
                'password' => Hash::make('Salamone014'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'admin' => 0
            ],
            [
                'id' => 15,
                'name' => 'CastellanoC',
                'email' => 'castellano@villasofia.it',
                'password' => Hash::make('Castellano015'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'admin' => 0
            ],




            );
        DB::table('users')->insert($users);
    }
}
