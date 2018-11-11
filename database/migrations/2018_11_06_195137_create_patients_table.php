<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'patients',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('first_name', 50)->nullable();
                $table->string('second_name', 50)->nullable();
                $table->string('family_name', 50)->nullable();
                $table->bigInteger('uid')->nullable();
                $table->boolean('valid');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
