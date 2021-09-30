<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Ejercicio;

class CreateEjerciciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejercicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('grupo_muscular');

            $table->foreign('grupo_muscular')
              ->references('id')
              ->on('grupo_musculars');
        });

        $data =  array(
            [
                'nombre' => 'Abdominales',
                'grupo_muscular' => 1
            ],
            [
                'nombre' => 'Pectorales',
                'grupo_muscular' => 2
            ]
        );
        foreach ($data as $dato){
            $ejercicio = new Ejercicio();
            $ejercicio->nombre = $dato['nombre'];
            $ejercicio->grupo_muscular = $dato['grupo_muscular'];
            $ejercicio->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ejercicios');
    }
}
