<?php

use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = App::make(Faker\Generator::class);
        App\Image::create([
            'name' => $faker->name,
            'hash_name' => '1afa148eb41f2e7103f21410bf48346c' . '.jpg',
            'dir' => 'public',
            'title' => $faker->word,
            'alt' => $faker->word
        ]);
    }
}
