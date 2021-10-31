<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Evento;
use App\Models\ClaseUser;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;


class ClaseTest extends TestCase
{

	use DatabaseTransactions;

	protected function clasesRoute()
    {
        return route('clases');
    }
    protected function clasesApiRoute()
    {
        return route('clasesCargadas');
    }
    protected function loginPostRoute()
    {
        return route('login');
    }
    protected function clasePostRoute()
    {
        return route('cargarClase');
    }
    protected function claseUsuarios()
    {
        return route('usuariosClases');
    }
    public function testIfUserNotLoggedCantEnterClases()
    {
        $response = $this->get($this->clasesRoute());
        $response->assertRedirect('/login');
        $response->assertLocation('/login');
    }
    public function testClasesViewWorks()
    {

        $user = User::factory()->create();
        $this->actingAs($user);

    	$response = $this->get($this->clasesRoute());
        $response->assertSuccessful();
        $response->assertViewIs('clases');
    }
    public function testClasesFetchApiWorks()
    {

        $user = User::factory()->create();
        $this->actingAs($user);

    	$response = $this->get($this->clasesApiRoute());
        $response->assertSuccessful();
        $response->assertStatus(200);
    }
    public function testClaseCanBeAddedToDb()
    {

        $user = User::factory()->create();
        $this->actingAs($user);
        $evento = Evento::factory()->create();
        $response = $this->post('/cargarClase', [
            'title' => $evento->title,
            'daysOfWeek' => $evento->day,
            'startTime' => $evento->start,
            'endTime' => $evento->start,
			'color' => $evento->color
        ]);

        $response->assertStatus(201); //201 Creado
    }
    public function testClaseWithoutFieldsCantBeAddedToDb()
    {

        $user = User::factory()->create();
        $this->actingAs($user);
        $evento = Evento::factory()->create();
        $response = $this->post('/cargarClase', [
        	//vacio
        ]);

        $response->assertStatus(500); //500 Falla
    }
    public function testUserCanBeAddedToClaseViewWorks()
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get($this->claseUsuarios());
        $response->assertSuccessful();
        $response->assertViewIs('usuariosClases');
    }
    public function testUserCanBeAddedToClaseWorksInDb()
    {

        $user = User::factory()->create();
        $this->actingAs($user);
        $claseuser = ClaseUser::factory()->create();
        $response = $this->post('/agregarUsuariosClases', [
            'clase' => $claseuser->id_clase,
            'user' => $claseuser->id_users,
            'cant_inscriptos' => $claseuser->cant_inscriptos,
        ]);

        $response->assertRedirect('/usuariosClases');//Redirecciona a la ruta especificada post creacion
    }
    public function testUserCantBeAddedToClaseWithoutFields()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $claseuser = ClaseUser::factory()->create();
        $response = $this->post('/agregarUsuariosClases', [
            //vacio
        ]);
        $response->assertStatus(500); //500 Falla
    }
    public function testDeleteClaseByID()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $clase = Evento::firstOrFail();
        $response = $this->get('/borrar/1');
        $otraClase = Evento::firstOrFail();
        $this->assertNotEquals($clase,$otraClase); // significa que borró el primer elemento porque eliminaba el de ID 1
        $response->assertRedirect('clases');
    }
    public function testClaseStatisticsView()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/estadisticasClases');
        $response->assertStatus(200);
        $response->assertViewIs('estadisticasClases');
    }
    public function testApiSearchClaseWorks()
    {
       $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/estadisticasClases/1');
        $response->assertSuccessful();
        $response->assertStatus(200);
    }
    public function testApiSearchUserWorks()
    {
       $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/estadisticasUsers/1');
        $response->assertSuccessful();
        $response->assertStatus(200);
    }
}
