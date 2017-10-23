<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();
        foreach($users as $user){
            factory(\App\Product::class, 10)->create(['user_id' => $user->id]);
        }
    }
}
