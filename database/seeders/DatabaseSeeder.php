<?php

namespace Database\Seeders;
use App\Models\Sport;
use App\Models\Athlete;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Sport::factory()->create([
            "name" => "Vault",
            "sport" => "Artistic Gymnastics",
            "division" => "Men's"
        ]);

        Sport::factory()->create([
            "name" => "Vault",
            "sport" => "Artistic Gymnastics",
            "division" => "Women's"
        ]);

        Sport::factory()->create([
            "name" => "4x100m Relay",
            "sport" => "Athletics",
            "division" => "Men's"
        ]);

        Sport::factory()->create([
            "name" => "10m Air Rifle Team",
            "sport" => "Shooting",
            "division" => "Mixed"
        ]);

        Sport::factory()->create([
            "name" => "200m Freestyle",
            "sport" => "Swimming",
            "division" => "Women's"
        ]);

        Athlete::factory(20)->create();
    }
}
