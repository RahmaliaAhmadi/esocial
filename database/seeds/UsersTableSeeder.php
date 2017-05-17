<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Sample data user 1 (admin)
      DB::table('users')->insert([
          'username' => 'admin',
          'email' => 'admin@gmail.com',
          'password' => bcrypt('admin'),
          'full_name' => 'Ali Baba',
          'phone' => '012-3456789',
          'address' => '123 Taman Berjaya Laravel, Puchong Selangor',
          'role' => 'admin',
          'picture' => 'default.jpg',
          'status' => 'active'
      ]);

      // Sample data user 2 (user)
      DB::table('users')->insert([
        'username' => 'demo',
        'email' => 'demo@gmail.com',
        'password' => bcrypt('demo'),
        'full_name' => 'Demo User',
        'phone' => '012-3456789',
        'address' => '123 Taman Berjaya Laravel, Puchong Selangor',
        'role' => 'user',
        'picture' => 'default.jpg',
        'status' => 'active'
      ]);

      // Sample data user 3 (user)
      DB::table('users')->insert([
        'username' => 'demo2',
        'email' => 'demo2@gmail.com',
        'password' => bcrypt('demo2'),
        'full_name' => 'Demo User 2',
        'phone' => '012-3456789',
        'address' => '123 Taman Berjaya Laravel, Puchong Selangor',
        'role' => 'user',
        'picture' => 'default.jpg',
        'status' => 'pending'
      ]);

    }
}
