<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('users')->insert([
          'name' => 'the admin',
          'email' => 'admin@gmail.com',
          'role' => 'admin',
          'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
          'name' => 'the user',
          'email' => 'user@gmail.com',
          'role' => 'user',
          'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'the user',
            'email' => 'instructor@gmail.com',
            'role' => 'instructor',
            'password' => Hash::make('password'),
          ]);
      }
}
