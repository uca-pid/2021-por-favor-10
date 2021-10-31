<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\RecursoClase;

class CreateRecursoClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recurso_clases', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->json('id_clases')->nullable();
            $table->integer('objetivo');
            $table->integer('real')->nullable();
            $table->integer('ocupacion')->nullable();
        });

        $data =  array(
            [
                'nombre' => 'Recurso Clase Test',
                'id_clases' => '["1","2"]',
                'objetivo' => '10',
                'real' => '5',
                'ocupacion' => '50'
            ],
            [
                'nombre' => 'Recurso Clase Test 2',
                'id_clases' => '["1"]',
                'objetivo' => '6',
                'real' => '3',
                'ocupacion' => '50'
            ]
        );

        foreach ($data as $dato){
            $recursoclase = new RecursoClase();
            $recursoclase->nombre = $dato['nombre'];
            $recursoclase->id_clases = $dato['id_clases'];
            $recursoclase->objetivo = $dato['objetivo'];
            $recursoclase->real = $dato['real'];
            $recursoclase->ocupacion = $dato['ocupacion'];
            $recursoclase->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recurso_clases');
    }
}
