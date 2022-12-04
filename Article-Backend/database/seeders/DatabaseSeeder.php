<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Gilang Fauziii',
            'email' => 'gilang@gmail.com',
            'password' => bcrypt('12345')
        ]);
        User::create([
            'name' => 'Udin',
            'email' => 'udin@gmail.com',
            'password' => bcrypt('12345')
        ]);
        User::create([
            'name' => 'Ujang',
            'email' => 'ujang@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Categories::create([
            'name' => 'Web Developer',
            'user_id' => '1'
        ]);
        Categories::create([
            'name' => 'Programming',
            'user_id' => '2'
        ]);
        Categories::create([
            'name' => 'Software Engineer',
            'user_id' => '3'
        ]);

        Post::create([
            'title' => 'Judul Pertama',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, aliquam sit iure in fuga optio quaerat blanditiis nobis ratione facilis distinctio doloribus consequuntur aspernatur, culpa porro esse atque? Qui officia asperiores id. Quibusdam dolor at neque ratione aut soluta aperiam enim magnam asperiores nobis nisi quidem, adipisci pariatur doloribus odit voluptate perferendis quasi autem laudantium fugit sed ipsam? Ipsam eaque fuga esse est dolorum debitis error, iste dignissimos odit quibusdam aut eligendi maxime et aperiam blanditiis. Consequuntur quis suscipit voluptatibus ut eum amet nostrum. Praesentium quis adipisci blanditiis fugit sunt, fuga nesciunt maiores quia consequatur rerum corporis accusamus corrupti quos.',
            'image' => 'gilang.jpg',
            'category_id' => 1,
            'user_id' => 1
        ]);
        Post::create([
            'title' => 'Judul Ke Dua',
            'content' => 'aliquam sit iure in fuga optio quaerat blanditiis nobis ratione facilis distinctio doloribus consequuntur aspernatur, culpa porro esse atque? Qui officia asperiores id. Quibusdam dolor at neque ratione aut soluta aperiam enim magnam asperiores nobis nisi quidem, adipisci pariatur doloribus odit voluptate perferendis quasi autem laudantium fugit sed ipsam? Ipsam eaque fuga esse est dolorum debitis error, iste dignissimos odit quibusdam aut eligendi maxime et aperiam blanditiis. Consequuntur quis suscipit voluptatibus ut eum amet nostrum. Praesentium quis adipisci blanditiis fugit sunt, fuga nesciunt maiores quia consequatur rerum corporis accusamus corrupti quos.',
            'image' => 'udin.jpg',
            'category_id' => 2,
            'user_id' => 2
        ]);
        Post::create([
            'title' => 'Judul Ke Tiga',
            'content' => 'Qui officia asperiores id. Quibusdam dolor at neque ratione aut soluta aperiam enim magnam asperiores nobis nisi quidem, adipisci pariatur doloribus odit voluptate perferendis quasi autem laudantium fugit sed ipsam? Ipsam eaque fuga esse est dolorum debitis error, iste dignissimos odit quibusdam aut eligendi maxime et aperiam blanditiis. Consequuntur quis suscipit voluptatibus ut eum amet nostrum. Praesentium quis adipisci blanditiis fugit sunt, fuga nesciunt maiores quia consequatur rerum corporis accusamus corrupti quos.',
            'image' => 'ujang.jpg',
            'category_id' => 3,
            'user_id' => 3
        ]);
    }
}