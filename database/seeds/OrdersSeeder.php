<?php

use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();
        $faker = App::make(Faker\Generator::class);

        foreach($users as $user) {
            $listUsers = array_diff(range(1, $users->count()), [$user->id]);

            //Sales
            foreach($user->products as $product){
                App\Order::create([
                    'customer_id' => $listUsers[array_rand($listUsers)],
                    'product_id' => $product->id,
                    'count' => $faker->randomDigitNotNull,
                ]);
            }
        }
    }
}
