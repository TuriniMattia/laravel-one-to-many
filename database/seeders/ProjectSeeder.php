<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeders\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project_name = $faker->sentence(8);
            $project->project_name = $project_name;
            $project->slug = Str::slug($project_name);
            $project->project_description = $faker->text(300);
            $project->github_link = $faker->url();
            $project->save();
        }
    }
}
