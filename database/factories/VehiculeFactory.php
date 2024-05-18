<?php 

namespace Database\Factories;

use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculeFactory extends Factory
{
    protected $model = Vehicule::class;

    public function definition()
    {
        return [
            'immatriculation' => $this->faker->bothify('??-###-??'),
            'marque' => $this->faker->company,
            'model' => $this->faker->word,
            'annee_model' => $this->faker->year,
            'type_vehicule' => $this->faker->randomElement(['perso', 'service']),
            'photo' => $this->faker->imageUrl(640, 480, 'transport', true),
            'code_employe' => \App\Models\User::factory(), // Assuming you have a User factory
            'id_agence' => \App\Models\Agence::factory(),
        ];
    }
}
