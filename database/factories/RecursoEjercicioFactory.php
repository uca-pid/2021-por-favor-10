<?php

namespace Database\Factories;

use App\Models\RecursoEjercicio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RecursoEjercicioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecursoEjercicio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => Str::random(5),
            'id_ejercicios' => '["2"]',
            'objetivo' => '20',
            'real' => '12',
            'ocupacion' => '60'
        ];
    }
}
