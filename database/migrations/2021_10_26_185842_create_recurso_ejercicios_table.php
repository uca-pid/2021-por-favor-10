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


        $data =  array(
            [
                'nombre' => 'Recurso Ejercicio Test',
                'id_ejercicios' => '["1","2"]',
                'objetivo' => '10',
                'real' => '5',
                'ocupacion' => '50'
            ],
            [
                'nombre' => 'Recurso Ejercicio Test 2',
                'id_ejercicios' => '["1"]',
                'objetivo' => '6',
                'real' => '3',
                'ocupacion' => '50'
            ]
        );

        foreach ($data as $dato){
            $recursoejercicio = new RecursoEjercicio();
            $recursoejercicio->nombre = $dato['nombre'];
            $recursoejercicio->id_ejercicios = $dato['id_ejercicios'];
            $recursoejercicio->objetivo = $dato['objetivo'];
            $recursoejercicio->real = $dato['real'];
            $recursoejercicio->ocupacion = $dato['ocupacion'];
            $recursoejercicio->save();
        }

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
