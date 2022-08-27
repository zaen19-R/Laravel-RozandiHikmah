<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Rozandi Hikmah',
            'username' => 'zandi',
            'email' => 'sangpnikmat@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::factory(5)->create();
        Category::create([
            'name' => 'Web Programing',
            'slug' => 'web-programing',
        ]);
        Category::create([
            'name' => 'Databases',
            'slug' => 'databases',
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        Post::factory(20)->create();
    }
}
