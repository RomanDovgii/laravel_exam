<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    use HasFactory;

    public function thing() {
        $this -> belongsTo(User::class);
    }

    public function use() {
        $this -> hasMany(Uses::class);
    }

    public function measurement() {
        $this -> belongsTo(Measurement::class);
    }
}
