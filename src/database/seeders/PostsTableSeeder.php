<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\Post::class, 20)->create();

        // $user = DB::table('users')->first(); // ★

        // DB::table('posts')->insert([
        //     'user_id' => $user->id, // ★
        //     'title' =>  'おらおらおろあおらおろあおらおらおろあおらおr',
        //     'body' => 'よーーーーーーーーーーーーーーーーーーー',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        //   ]);
    

    }
}
