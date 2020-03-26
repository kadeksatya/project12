<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name'=>'Kadek Restu Satya Wardana',
            'username' => 'kadeksatyaa',
            'password' => bcrypt('password123'),
            'role_id' =>'1',
        ]
    );

    }
}