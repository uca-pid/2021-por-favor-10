<?php

namespace Database\Factories;

use App\Models\ClaseUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClaseUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClaseUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_clase' => '0',
            'id_users' => '["55","56"]',
            'cant_inscriptos' => '1',
        ];
    }
}
