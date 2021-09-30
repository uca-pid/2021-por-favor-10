<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Rutina;

class CreateRutinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutinas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->json('ejercicios');
            $table->string('icono');
            $table->timestamps();
        });

        $data =  array(
            [
                'nombre' => 'Rutina Test',
                'ejercicios' => ('{"1":[{"ejercicio_id":"2","repeticiones":"15"}],"2":[{"ejercicio_id":"1","repeticiones":"10"}],"3":[],"4":[],"5":[],"6":[],"7":[]}')
            ],
            [
                'nombre' => 'Rutina Ejemplo',
                'ejercicios' => ('{"1":[{"ejercicio_id":"2","repeticiones":"15"}],"2":[{"ejercicio_id":"1","repeticiones":"10"}],"3":[],"4":[],"5":[],"6":[],"7":[]}')
            ]
        );
        foreach ($data as $dato){
            $rutina = new Rutina();
            $rutina->nombre = $dato['nombre'];
            $rutina->ejercicios = $dato['ejercicios'];
            $rutina->icono = 'fas fa-dumbbell'; // icono de pesa
            $rutina->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutinas');
    }
}
