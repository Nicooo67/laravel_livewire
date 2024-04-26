<?php

namespace Database\Factories;

use App\Models\Carte;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarteFactory extends Factory
{
    protected $model = Carte::class;

    public function definition()
    {
        return [
            'libelle' => $this->faker->word,
            'description' => $this->faker->optional()->sentence,
        ];
    }
}
