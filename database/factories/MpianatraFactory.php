<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mpianatra>
 */
class MpianatraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom"=>$this->faker->firstName()
            ,"prenom"=>$this->faker->lastName()
            ,"email"=>$this->faker->email()
            ,"matricule"=>rand(0,1000),
            "sexe"=>["M","F"][rand(0,1)],
            "description"=>$this->faker->text(400,"fr"),
            "niveau"=>[0,1,2,3,4][rand(0,4)],
            "filiere"=>[0,1,2][rand(0,2)] ,
        ];
    }
}
