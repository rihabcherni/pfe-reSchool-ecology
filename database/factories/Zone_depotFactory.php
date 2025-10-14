<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class Zone_depotFactory extends Factory{
    public function definition() {
        return [
            'zone_travail_id'=> \App\Models\Zone_travail::all()->random()->id,
            'adresse'=> $this->faker->address,
            'longitude'=> $this->faker->longitude($min = 10.1, $max = 10.25),
            'latitude'=> $this->faker->latitude($min = 36.75, $max = 36.8),
            'quantite_depot_maximale'=> $this->faker->randomNumber(5,true),
            'quantite_depot_actuelle_plastique'=> random_int(1000,100000),
            'quantite_depot_actuelle_papier'=> random_int(1000,100000),
            'quantite_depot_actuelle_composte'=>  random_int(1000,100000),
            'quantite_depot_actuelle_canette'=> random_int(1000,100000),
        ];
    }
}
