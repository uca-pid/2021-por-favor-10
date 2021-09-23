<?php

namespace Database\Factories;

use App\Models\Rutina;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RutinaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rutina::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $ejerciciosRutina = new \stdClass();
        return [
            'nombre' => Str::random(5),
            'ejercicios' => json_decode('{"1":[{"ejercicio_id":"1","repeticiones":"15"}],"2":[{"ejercicio_id":"1","repeticiones":"14"},{"ejercicio_id":"1","repeticiones":"14"}],"3":[{"ejercicio_id":"1","repeticiones":"145"}],"4":[{"ejercicio_id":"1","repeticiones":"124"}],"5":[{"ejercicio_id":"1","repeticiones":"123"}],"6":[{"ejercicio_id":"1","repeticiones":"154"}],"7":[{"ejercicio_id":"1","repeticiones":"235"}]}'),
        ];
    }
}
