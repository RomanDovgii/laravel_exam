<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Place;

class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = Place::class;
     
    public function definition()
    {
        return [
            'name' => $this -> faker -> word(),  
            'description' => $this -> faker ->  text(),
            'repair' => $this -> faker -> word(),
            'work' => $this -> faker -> boolean()
        ];
    }
}
