<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $p1 = new user();
        $p1->name = 'admin1';
        $p1->email = 'admin1@mail.com';
        $P3hash = Hash::make('admin1');

        $p1->password = $P3hash;
        $p1->save();

        $p2 = new user();
        $p2->name = 'admin2';
        $p2->email = 'admin2@mail.com';
        $P2hash = Hash::make('admin2');

        $p2->password = $P2hash;
        $p2->save();

        $p3 = new user();
        $p3->name = 'admin3';
        $p3->email = 'admin3@mail.com';
        $hash = Hash::make('admin3');
        $p3->password = $hash;
        $p3->save();

    }
}