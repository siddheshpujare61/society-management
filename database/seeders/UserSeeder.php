<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => "Test",
            'last_name' => "Admin",
            'email' => 'admin@gmail.com',
            'mobile' => '9999999999',
            'password' => Hash::make('password'),
            'flat_no' => 'A wing - 101',
            'address_line1' => 'Test address1',
            'address_line2' => 'Test address2',
            'address_line3' => 'Test address3',
            'is_active' => 1,
            'user_group' => 'admin',
            'profile_pic' => 'NULL'
        ]);
    }
}
