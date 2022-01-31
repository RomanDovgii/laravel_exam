<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uses extends Model
{
    use HasFactory;

        public function user() {
            return $this -> belongsTo(User::class);
        }

    public function place() {
        return $this -> belongsTo(Place::class);
    }

    public function thing() {
        return $this -> belongsTo(Thing::class);
    }


}
