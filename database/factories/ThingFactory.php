<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Thing;

class ThingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Thing::class;

    public function definition()
    {
        return [
            'name' => $this -> faker -> word(),  
            'description' => $this -> faker ->  text(),
            'wrnt' => $this -> faker -> date(),
        ];
    }
}
