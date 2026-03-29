<?php

namespace Database\Seeders;

use App\Models\Cat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class CatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $cats = [
            ["Milo", "M"],
            ["Luna", "F"],
            ["Leo", "M"],
            ["Bella", "F"],
            ["Oliver", "M"],
            ["Chloe", "F"],
            ["Simba", "M"],
            ["Nala", "F"],
            ["Loki", "M"],
            ["Mia", "F"],
            ["Oscar", "M"],
            ["Zoe", "F"],
            ["Charlie", "M"],
            ["Sophie", "F"],
            ["Max", "M"],
            ["Daisy", "F"],
            ["Rocky", "M"],
            ["Lilly", "F"],
            ["Thor", "M"],
            ["Coco", "F"],
            ["Jack", "M"],
            ["Molly", "F"],
            ["Toby", "M"],
            ["Ruby", "F"],
            ["Felix", "M"],
            ["Emma", "F"],
            ["George", "M"],
            ["Nina", "F"],
            ["Sam", "M"],
            ["Kira", "F"]
        ];

        foreach ($cats as $cat) {

            $newCat = new Cat();
            $newCat->name = $cat[0];
            $newCat->slug = strtolower($cat[0]);
            $newCat->sex = $cat[1];
            $newCat->date_of_birth = rand(2018, 2023) . "-" . str_pad(rand(1, 12), 2, "0", STR_PAD_LEFT);
            $newCat->coat = collect(["Tigrato", "Nero", "Bianco", "Grigio", "Rosso", "Calico"])->random();
            $newCat->image = strtolower($cat[0]) . ".jpg";
            $newCat->info = $faker->sentence();
            $newCat->adottato = rand(0, 1);
            $newCat->prenotato = rand(0, 1);

            $newCat->save();

        }
    }
}
