<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\RecursoEjercicio;

class CreateRecursoEjerciciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recurso_ejercicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->json('id_ejercicios')->nullable();
            $table->integer('objetivo');
            $table->integer('real')->nullable();
            $table->integer('ocupacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recurso_ejercicios');
    }
}
