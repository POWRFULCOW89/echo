<?php

namespace Database\Seeders;

use Database\Factories\UserListFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserListFactory::new()->count(10)->create();
    }
}
