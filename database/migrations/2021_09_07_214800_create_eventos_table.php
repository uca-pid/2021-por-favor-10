<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Evento;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('day');
            $table->string('start');
            $table->string('end');
            $table->string('color');
        });

        $data =  array(
            [
                'title' => 'Clase yoga',
                'day' => '1',
                'start' => '9:00',
                'end' => '11:00',
                'color' => 'fc-event-solid-danger'
            ],
            [
                'title' => 'Clase crossfit',
                'day' => '2',
                'start' => '14:00',
                'end' => '16:00',
                'color' => 'fc-event-solid-warning'
            ],
            [
                'title' => 'Clase pilates',
                'day' => '5',
                'start' => '17:00',
                'end' => '20:00',
                'color' => 'fc-event-solid-info'
            ],
            [
                'title' => 'Clase aeróbicos',
                'day' => '3',
                'start' => '12:00',
                'end' => '14:00',
                'color' => 'fc-event-solid-primary'
            ]
        );
        foreach ($data as $dato){
            $evento = new Evento();
            $evento->title = $dato['title'];
            $evento->day = $dato['day'];
            $evento->start = $dato['start'];
            $evento->end = $dato['end'];
            $evento->color = $dato['color'];
            $evento->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
