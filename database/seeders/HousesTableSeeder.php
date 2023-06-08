<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\House;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = ['Loft', 'Villa', 'Villetta', 'Magazzino', 'Monolocale', 'Appartamento'];
        for($i = 0; $i < 100; $i++){
            $new_house = new House();
            $new_house->reference = $faker->word();
            //TODO: controllo univocità slug
            $new_house->slug = Str::slug($new_house->reference, '-');
            $new_house->address = $faker->address();
            $new_house->postal_code = $faker->postcode();
            $new_house->city = $faker->city();
            $new_house->state = $faker->state();
            $new_house->square_meters = $faker->numberBetween(20, 1000);
            $new_house->rooms = $faker->numberBetween(1, 100);
            $new_house->type = $faker->randomElement($types);
            $new_house->description = $faker->text();
            $new_house->price = $faker->randomFloat(2, 10000, 10000000);
            $new_house->energy_rating = $faker->randomElement(['a','aa','aaa','b','c','d']);
            $new_house->bathrooms = $faker->randomNumber(1);

            $new_house->save();
        }
    }
}
