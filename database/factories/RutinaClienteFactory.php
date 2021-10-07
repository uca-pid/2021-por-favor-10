<?php

namespace Database\Factories;

use App\Models\RutinaCliente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RutinaClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RutinaCliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_rutina' => '1',
            'id_clientes' => '["2"]',
            'cant_inscriptos' => '1',
        ];
    }
}
