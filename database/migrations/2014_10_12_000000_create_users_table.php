<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        $data =  array(
            [
                'name' => 'Juan Carlos',
                'email' => 'juan@carlos.com',
                'password' => '$2y$10$2C7ZNi1O5dlF6M1J6PLtSeId2b.qumiGerdu18PHoko1d.e6v5Tsq'
            ],
            [
                'name' => 'Martin',
                'email' => 'martin@mail.com',
                'password' => '$2y$10$2C7ZNi1O5dlF6M1J6PLtSeId2b.qumiGerdu18PHoko1d.e6v5Tsq'
            ],
            [
                'name' => 'Pedro',
                'email' => 'pedro@mail.com',
                'password' => '$2y$10$2C7ZNi1O5dlF6M1J6PLtSeId2b.qumiGerdu18PHoko1d.e6v5Tsq'
            ],
            [
                'name' => 'Sofia',
                'email' => 'sofia@mail.com',
                'password' => '$2y$10$2C7ZNi1O5dlF6M1J6PLtSeId2b.qumiGerdu18PHoko1d.e6v5Tsq'
            ],
            [
                'name' => 'Test',
                'email' => 'test@test.com',
                'password' => '$2y$10$2C7ZNi1O5dlF6M1J6PLtSeId2b.qumiGerdu18PHoko1d.e6v5Tsq'
            ],
            [
                'name' => 'Estani',
                'email' => 'estanimw296@gmail.com',
                'password' => '$2y$10$2C7ZNi1O5dlF6M1J6PLtSeId2b.qumiGerdu18PHoko1d.e6v5Tsq'
            ],
            [
                'name' => 'Salva',
                'email' => 'salvasteverlynck@gmail.com',
                'password' => '$2y$10$2C7ZNi1O5dlF6M1J6PLtSeId2b.qumiGerdu18PHoko1d.e6v5Tsq'
            ],
            [
                'name' => 'Gonza',
                'email' => 'gonzablomberg12@gmail.com',
                'password' => '$2y$10$2C7ZNi1O5dlF6M1J6PLtSeId2b.qumiGerdu18PHoko1d.e6v5Tsq'
            ]
        );
        foreach ($data as $dato){
            $usuario = new User();
            $usuario->name = $dato['name'];
            $usuario->email = $dato['email'];
            $usuario->password = $dato['password'];
            $usuario->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
