<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Agence;
use App\Models\Fonction;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prenom' => $this->faker->firstName(),
            'nom' => $this->faker->lastName(),
            'utilisateur' => $this->faker->userName(),
            'mot_de_passe' => bcrypt('password'), // Adjust column name if different
            'email' => $this->faker->unique()->safeEmail(),
            'date_naissance' => $this->faker->date(),
            'date_embauche' => $this->faker->date(),
            'id_agence' => Agence::factory(), // Create an Agence model
            'code_fonction' => function () {
                return Fonction::inRandomOrder()->first()->code_fonction;
            }
        ];
    }
}
