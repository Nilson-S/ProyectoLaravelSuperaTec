<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar los campos antiguos
            $table->dropColumn(['pregunta_secreta', 'respuesta_secreta']);

            // Agregar el nuevo campo de pregunta secreta como un enum
            $table->enum('pregunta_secreta', [
                '¿Cuál es el nombre de tu primera mascota?',
                '¿Cuál es tu comida favorita?',
                '¿En qué ciudad naciste?'
            ])->after('password');

            // Agregar el nuevo campo de respuesta secreta
            $table->string('respuesta_secreta')->after('pregunta_secreta');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Revertir los cambios si se ejecuta un rollback
            $table->dropColumn(['pregunta_secreta', 'respuesta_secreta']);
            $table->string('pregunta_secreta')->after('password');
            $table->string('respuesta_secreta')->after('pregunta_secreta');
        });
    }
};