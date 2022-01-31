<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Thing;
use App\Models\Role;
use App\Models\Uses;
use App\Models\Place;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name', 'administrator') -> value('id');
        $moder = Role::where('name', 'moderator') -> value('id');
        $usr = Role::where('name', 'user') -> value('id');

        $administrator = new User();
        $administrator -> name = 'Roman Dovgii';
        $administrator -> email = 'romandovgiiwork@gmail.com';
        $administrator -> password = Hash::make(89037839344);
        $administrator -> user_role_id = 1;
        $administrator -> save();

        $moderator = new User();
        $moderator -> name = 'Test Moderator';
        $moderator -> email = 'dowgy.roma@yandex.ru';
        $moderator -> password = Hash::make(123456);
        $moderator -> user_role_id = 2;
        $moderator -> save();

        $user = new User();
        $user -> name = 'Test User';
        $user -> email = 'dowgy.roman@gmail.com';
        $user -> password = Hash::make(123456);
        $user -> user_role_id = 3;
        $user -> save();

        for ($i=0; $i < 100; $i++) {
            Uses::factory() -> forUser() -> forThing() -> forPlace() -> create();
        }
    }
}
