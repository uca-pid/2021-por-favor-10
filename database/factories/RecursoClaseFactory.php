<?php

namespace Database\Factories;

use App\Models\RecursoClase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RecursoClaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecursoClase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => Str::random(5),
            'id_clases' => '["45"]',
            'objetivo' => '8',
            'real' => '5',
            'ocupacion' => '62'
        ];
    }
}
