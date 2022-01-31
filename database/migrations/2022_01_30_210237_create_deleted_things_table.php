<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeletedThingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deleted_things', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->date('wrnt');
            $table->unsignedBigInteger('last_owner_id')->default(1);
            $table->index('last_owner_id', 'last_owner_id_idx');
            $table->foreign('last_owner_id', 'last_owner_id_fk')->references('id')->on('users');
            $table->timestamps();
            $table->boolean('restoration') -> default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deleted_things');
    }
}
