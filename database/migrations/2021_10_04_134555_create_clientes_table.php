<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Cliente;


class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email');
            $table->timestamps();
        });

        $data =  array(
            [
                'nombre' => 'Antonio',
                'email' => 'antonio@mail.com',
                'created_at' => '2021-05-04 14:14:19',
                'updated_at' => '2021-05-04 14:14:19'
            ],
            [
                'nombre' => 'Juan',
                'email' => 'juan@mail.com',
                'created_at' => '2021-05-05 14:14:19',
                'updated_at' => '2021-05-05 14:14:19'
            ],
            [
                'nombre' => 'Manuel',
                'email' => 'manuel@mail.com',
                'created_at' => '2021-06-04 14:14:19',
                'updated_at' => '2021-06-04 14:14:19'
            ],
            [
                'nombre' => 'Maria',
                'email' => 'maria@mail.com',
                'created_at' => '2021-06-05 14:14:19',
                'updated_at' => '2021-06-05 14:14:19'
            ],
            [
                'nombre' => 'Ana',
                'email' => 'ana@mail.com',
                'created_at' => '2021-08-04 14:14:19',
                'updated_at' => '2021-08-04 14:14:19'
            ],
            [
                'nombre' => 'Laura',
                'email' => 'laura@mail.com',
                'created_at' => '2021-08-05 14:14:19',
                'updated_at' => '2021-08-05 14:14:19'
            ],
            [
                'nombre' => 'Pablo',
                'email' => 'pablo@mail.com',
                'created_at' => '2021-09-04 14:14:19',
                'updated_at' => '2021-09-04 14:14:19'
            ],
            [
                'nombre' => 'Pedro',
                'email' => 'pedro@mail.com',
                'created_at' => '2021-10-02 14:14:19',
                'updated_at' => '2021-10-02 14:14:19'
            ],
            [
                'nombre' => 'Graciela',
                'email' => 'graciela@mail.com',
                'created_at' => '2021-10-03 14:14:19',
                'updated_at' => '2021-10-03 14:14:19'
            ],
            [
                'nombre' => 'Tomas',
                'email' => 'tomas@mail.com',
                'created_at' => '2021-10-04 14:14:19',
                'updated_at' => '2021-10-04 14:14:19'
            ],

        );
        foreach ($data as $dato){
            $cliente = new Cliente();
            $cliente->nombre = $dato['nombre'];
            $cliente->email = $dato['email'];
            $cliente->created_at = $dato['created_at'];
            $cliente->updated_at = $dato['updated_at'];
            $cliente->save();
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
