<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

use function Laravel\Prompts\table;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Admin 
            [
                'name' => 'Ayush Chaturvedi',
                'username' => 'admin',
                'email' => 'admin@easymart.com',
                'password' => '$2y$12$6eROI4qlDhAuz9CznqyRM.LtGGv/gAmOJvAtl2FixRNIlqYBJTyqq', //Ayush@123
                'role' => 'admin',
                'status' => 'active',
            ],
            //Vendor
            [
                'name' => 'Vendor',
                'username' => 'vendor',
                'email' => 'vendor@easymart.com',
                'password' => '$2y$12$6eROI4qlDhAuz9CznqyRM.LtGGv/gAmOJvAtl2FixRNIlqYBJTyqq', //Ayush@123
                'role' => 'vendor',
                'status' => 'active',
            ],
            //User Or Customer
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => '$2y$12$6eROI4qlDhAuz9CznqyRM.LtGGv/gAmOJvAtl2FixRNIlqYBJTyqq', //Ayush@123
                'role' => 'user',
                'status' => 'active',
            ],
        ]);
    }
}