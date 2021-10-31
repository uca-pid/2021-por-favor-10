<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Evento;
use App\Models\ClaseUser;
use App\Models\RutinaCliente;
use App\Models\Rutina;
use App\Models\RecursoClase;
use App\Models\RecursoEjercicio;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RecursoTest extends TestCase
{
    
    use DatabaseTransactions;

    protected function recursoclaseRoute()
    {
        return route('recursoclases');
    }
    protected function recursoejercicioRoute()
    {
        return route('recursoejercicios');
    }
    public function testIfUserNotLoggedCantEnterRecursoClase()
    {
        $response = $this->get($this->recursoclaseRoute());
        $response->assertRedirect('/login');
        $response->assertLocation('/login');
    }
    public function testIfUserNotLoggedCantEnterRecursoEjercicio()
    {
        $response = $this->get($this->recursoejercicioRoute());
        $response->assertRedirect('/login');
        $response->assertLocation('/login');
    }
    public function testRecursoClaseViewWorks()
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get($this->recursoclaseRoute());
        $response->assertSuccessful();
        $response->assertViewIs('recursos.recursoclases');
    }
    public function testRecursoEjercicioViewWorks()
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get($this->recursoejercicioRoute());
        $response->assertSuccessful();
        $response->assertViewIs('recursos.recursoejercicios');
    }
    public function testRecursoClaseCanBeCreatedInDb()
    {

        $user = User::factory()->create();
        $this->actingAs($user);
        $recursoclase = RecursoClase::factory()->create();
        $response = $this->post('/crearRecursoClase', [
            'nombre_rec' => $recursoclase->nombre,
            'objetivo_rec' => $recursoclase->objetivo,
        ]);

        $response->assertRedirect('/recursoclases');
        $response->assertLocation('/recursoclases');
        //OK DADO QUE FUE REDIRECCIONADO DONDE SE SUPONIA POST CREACION

    }
    public function testRecursoEjercicioCanBeCreatedInDb()
    {

        $user = User::factory()->create();
        $this->actingAs($user);
        $recursoejercicio = RecursoEjercicio::factory()->create();
        $response = $this->post('/crearRecursoEjercicio', [
            'nombre_rec' => $recursoejercicio->nombre,
            'objetivo_rec' => $recursoejercicio->objetivo
        ]);
        $response->assertRedirect('/recursoejercicios');
        $response->assertLocation('/recursoejercicios');
        //OK DADO QUE FUE REDIRECCIONADO DONDE SE SUPONIA POST CREACION
    }
    public function testRecursoClaseWithoutFieldsCantBeCreatedInDb()
    {

        $user = User::factory()->create();
        $this->actingAs($user);
        $recursoclase = RecursoClase::factory()->create();
        $response = $this->post('/crearRecursoClase', [
            //vacio
        ]);

        $response->assertStatus(500); //500 Falla
    }
    public function testRecursoEjercicioWithoutFieldsCantBeCreatedInDb()
    {

        $user = User::factory()->create();
        $this->actingAs($user);
        $recursoejercicio = RecursoEjercicio::factory()->create();
        $response = $this->post('/crearRecursoEjercicio', [
            //vacio
        ]);

        $response->assertStatus(500); //500 Falla
    }
    public function testRecursoClaseCanBeAddedToDb()
    {

        $user = User::factory()->create();
        $this->actingAs($user);
        $recursoclase = RecursoClase::factory()->create();
        $response = $this->post('/agregarClaseRecurso', [
            'recurso' => '1',
            'clase' => '1'
        ]);

        $response->assertRedirect('/recursoclases');
        $response->assertLocation('/recursoclases');
        //OK DADO QUE FUE REDIRECCIONADO DONDE SE SUPONIA POST CREACION

    }
    public function testRecursoEjercicioCanBeAddedToDb()
    {

        $user = User::factory()->create();
        $this->actingAs($user);
        $recursoejercicio = RecursoEjercicio::factory()->create();
        $response = $this->post('/agregarEjercicioRecurso', [
            'recurso' => '1',
            'ejercicio' => '1'
        ]);
        $response->assertRedirect('/recursoejercicios');
        $response->assertLocation('/recursoejercicios');
        //OK DADO QUE FUE REDIRECCIONADO DONDE SE SUPONIA POST CREACION
    }
    public function testRecursoClaseWithoutFieldsCantBeAddedToDb()
    {

        $user = User::factory()->create();
        $this->actingAs($user);
        $recursoclase = RecursoClase::factory()->create();
        $response = $this->post('/agregarClaseRecurso', [
            //vacio
        ]);

        $response->assertStatus(500); //500 Falla
    }
    public function testRecursoEjercicioWithoutFieldsCantBeAddedToDb()
    {

        $user = User::factory()->create();
        $this->actingAs($user);
        $recursoejercicio = RecursoEjercicio::factory()->create();
        $response = $this->post('/agregarEjercicioRecurso', [
            //vacio
        ]);

        $response->assertStatus(500); //500 Falla
    }
}
