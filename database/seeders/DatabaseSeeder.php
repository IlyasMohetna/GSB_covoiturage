<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RegionSeeder::class);
        $this->call(DepartementSeeder::class);
        $this->call(VilleSeeder::class);
        $this->call(AgenceSeeder::class);
        $this->call(FonctionSeeder::class);
        $this->call(EmployeSeeder::class);
        $this->call(VehiculeSeeder::class);
        $this->call(RolesSeeder::class);
    }
}
