<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('things', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->date('wrnt');
            $table->unsignedBigInteger('master')->default(1);
            $table->index('master', 'master_idx');
            $table->foreign('master', 'master_fk')->references('id')->on('users');
            $table->unsignedBigInteger('measurement_id')->nullable();
            $table->index('measurement_id', 'measurement_idx');
            $table->foreign('measurement_id', 'measurement_id_fk')->references('id')->on('measurements');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('things');
    }
}
