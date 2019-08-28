<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 10; $i++) { 
    		Post::create([
    			"title" => "Title of the blog " .$i,
    			"body" => "This is a random description _ " .str_random(10)
    		]);
    	}

    }
}
