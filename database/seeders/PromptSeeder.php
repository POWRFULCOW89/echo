<?php

namespace Database\Seeders;

use Database\Factories\PromptFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PromptFactory::new()->count(10)->create();
    }
}
