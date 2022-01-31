<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Measurement;

class MeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $it = new Measurement();
        $it -> name = 'piece';
        $it -> save();
        
        $kg = new Measurement();
        $kg -> name = 'kilogram';
        $kg -> save();

        $lt = new Measurement();
        $lt -> name = 'liter';
        $lt -> save();
    }
}
