<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Uses;

class UsesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Uses::class;

    public function definition()
    {
        return [
            'amount' => $this -> faker -> numberBetween(10, 20)
        ];
    }
}
