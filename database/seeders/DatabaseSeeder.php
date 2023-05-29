<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Post::factory(20)->create();

        /** @var \App\Models\User $adminUser */
        // $adminUser = User::factory()->create([
        //     'email'    => 'leo@example.com',
        //     'name'     => 'Leo',
        //     'password' => bcrypt('admin123')
        // ]);

        // $adminRole = Role::create([
        //     'name' => 'admin'
        // ]);

        // $adminUser->assignRole($adminRole);

        User::factory(9)->create();

        // $category = Category::create([

        // ]);

        Category::create([
            'title' => 'Entertainment',
            'slug'  => 'entertainment'
        ]);

        Category::create([
            'title' => 'World',
            'slug'  => 'world'
        ]);

        Category::create([
            'title' => 'Art',
            'slug'  => 'art'
        ]);

        Category::create([
            'title' => 'Sport',
            'slug'  => 'sport'
        ]);

        Category::create([
            'title' => 'Vintage',
            'slug'  => 'vintage'
        ]);

        Category::create([
            'title' => 'Music',
            'slug'  => 'music'
        ]);
    }
}
