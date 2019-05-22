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
        factory(App\User::class)->create([
            'name' => 'gerferson',
            'email' =>'teste@gmail.com',
        ]);

        factory(App\User::class)->create([
            'name' => 'admin',
            'email' =>'admin@admin.com'
        ]);
    }
}
