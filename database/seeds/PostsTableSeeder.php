<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Demo post 1
      DB::table('posts')->insert([
        'user_id' => 2,
        'title' => 'Sample Post 1',
        'content' => 'Ini adalah content post 1',
        'status' => 'published'
      ]);

      // Demo post 2
      DB::table('posts')->insert([
        'user_id' => 2,
        'title' => 'Sample Post 2',
        'content' => 'Ini adalah content post 2',
        'status' => 'draft'
      ]);
    }
}
