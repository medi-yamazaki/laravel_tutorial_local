<?php

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
        // $this->call(UsersTableSeeder::class);
        // $names = ['test',];
        // foreach ($names as $name) {
        //     DB::table('users')->insert([
        //         'name' => $name,
        //         'email' => 'test@mediwl.co.jp',
        //         'email_verified_at' => null,
        //         'password' => 'aaaa',
        //         'remember_token' => 'aaaa',
        //         'created_at' => null,
        //         'updated_at' => null,
        //     ]);
        // }
        // DB::table('users')->insert([
        //     'name' => 'test',
        //     'email' => 'test@a.com',
        //     'email_verified_at' => null,
        //     'password' => 'testuser',
        //     'remember_token' => 'bbbb',
        //     'created_at' => null,
        //     'updated_at' => null,
        // ]);

        DB::table('todos')->insert([
            'title' => 'test02 todo',
            'description' => 'test02aaaaamediwl.co.jp',
            // 'user_id' => 2,
            'created_at' => null,
            'updated_at' => null,
        ]);
    }
}
