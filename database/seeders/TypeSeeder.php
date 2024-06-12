<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $types = Type::all();

        $ids = [];
        foreach ($types as $type) {
            $ids[] = $type->id;
        }

        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $type = new Type();
            $name = $faker->sentence(10);
            $type->name = $name;
            $type->slug = Str::slug($name);

            $type->save();
        }
    }
}
