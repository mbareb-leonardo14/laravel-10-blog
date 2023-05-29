<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\TextWidget;
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
        $adminUser = User::factory()->create([
            'email'    => 'leo@example.com',
            'name'     => 'Leo',
            'password' => bcrypt('admin123')
        ]);

        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $adminUser->assignRole($adminRole);

        User::factory(9)->create();

        // $category = Category::create([

        // ]);

        // CategoryPost::factory(100)->create();

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

        TextWidget::create([
            'key'   => 'header',
            'title' => "Tailwind doesn't include pre-designed button styles out of the box, but they're easy to build using existing utilities.  Here are a few examples to help you get an idea of how to build components like this using Tailwind.",
        ]);
        TextWidget::create([
            'key'   => 'who-i-am',
            'title' => "Luminaire",
        ]);
        TextWidget::create([
            'key'    => 'about-us',
            'title'  => "<p>&nbsp;21 About Us Page Examples with Templates (2023) An 'About Us' page is a spot for your founding story, a place to show off your business wins, and a sales page that answers the most pressing question new customers have about your business</p>",
            'active' => 1
        ]);
    }
}
