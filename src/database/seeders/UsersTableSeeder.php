<?php

namespace Database\Seeders; // 追加

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(\App\User::class, 50)->create();
        User::factory()->count(30)->create(); // Laravel8
        // DB::table('users')->insert([
        //     'name' => 'test',
        //     'email' => 'dummy@email.com',
        //     'password' => bcrypt('test1234'),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

    }
}