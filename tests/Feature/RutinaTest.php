<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Evento;
use App\Models\ClaseUser;
use App\Models\RutinaCliente;
use App\Models\Rutina;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RutinaTest extends TestCase
{
    use DatabaseTransactions;

    protected function rutinaRoute()
    {
        return route('rutinas');
    }
    protected function rutinaClienteRoute()
    {
        return route('rutinaCliente');
    }
    public function testIfUserNotLoggedCantEnterRutinas()
    {
        $response = $this->get($this->rutinaRoute());
        $response->assertRedirect('/login');
        $response->assertLocation('/login');
    }
    public function testRutinaViewWorks()
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get($this->rutinaRoute());
        $response->assertSuccessful();
        $response->assertViewIs('rutinas.listRutinas');
    }
    public function testClienteCanBeAddedToRutinaViewWorks()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get($this->rutinaClienteRoute());
        $response->assertSuccessful();
        $response->assertViewIs('rutinas.rutinaCliente');
    }
    public function testClienteCanBeAddedToRutinaWorksInDb()
    {

        $user = User::factory()->create();
        $this->actingAs($user);
        $rutinacliente = RutinaCliente::factory()->create();
        $response = $this->post('/agregarClienteRutina', [
            'rutina' => $rutinacliente->id_rutina,
            'cliente' => $rutinacliente->id_clientes,
            'cant_inscriptos' => $rutinacliente->cant_inscriptos,
        ]);

        $response->assertRedirect('/rutinaCliente');//Redirecciona a la ruta especificada post creacion
    }
    public function testClienteCantBeAddedToRutinaWithoutFields()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $rutinacliente = RutinaCliente::factory()->create();
        $response = $this->post('/agregarClienteRutina', [
            //vacio
        ]);
        $response->assertStatus(500); //500 Falla
    }
}
