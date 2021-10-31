<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Evento;
use App\Models\ClaseUser;
use App\Models\Ejercicio;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;


class EjercicioTest extends TestCase
{

    use DatabaseTransactions;

    protected function ejerciciosRoute()
    {
        return route('ejercicios');
    }
    public function testIfUserNotLoggedCantEnterEjercicios()
    {
        $response = $this->get($this->ejerciciosRoute());
        $response->assertRedirect('/login');
        $response->assertLocation('/login');
    }
    public function testEjerciciosViewWorks()
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get($this->ejerciciosRoute());
        $response->assertSuccessful();
        $response->assertViewIs('ejercicios.listEjercicios');
    }
    public function testEjercicioCanBeAddedToDb()
    {

        $user = User::factory()->create();
        $this->actingAs($user);
        $ejercicios = Ejercicio::factory()->create();
        $response = $this->post('/ejercicios', [
            'nombre' => $ejercicios->nombre,
            'grupo_muscular' => $ejercicios->grupo_muscular,
        ]);

        $response->assertRedirect('/ejercicios'); //Redirecciona a la ruta especificada post creacion
    }
    public function testEjercicioCantBeAddedToDbWithoutFields()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $ejercicios = Ejercicio::factory()->create();
        $response = $this->post('/ejercicios', [
            //vacio
        ]);
        $response->assertStatus(302);
    }

    // API

    public function testAPIEjercicioList()
    {
        $response = $this->get('api/ejercicios');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                 'id',
                 'nombre',
                 'grupo_muscular'
            ]
        ]);
    }
}
