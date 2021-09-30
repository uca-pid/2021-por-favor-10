<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Evento;
use App\Models\ClaseUser;
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
/*    public function testRutinaCanBeAddedToDb()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $rutina = Rutina::factory()->create();
        $response = $this->post('/rutinas', [
            'nombre' => $rutina->nombre,
            'ejercicios' => $rutina->ejercicios,
            //'icono' => $rutina->icono,
        ]);

        $response->assertStatus(201); //201 Creado
    }*/
}
