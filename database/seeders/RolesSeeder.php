<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin -> name = 'administrator';
        $admin -> save();
        
        $moderator = new Role();
        $moderator -> name = 'moderator';
        $moderator -> save();

        $user = new Role();
        $user -> name = 'user';
        $user -> save();
    }
}
