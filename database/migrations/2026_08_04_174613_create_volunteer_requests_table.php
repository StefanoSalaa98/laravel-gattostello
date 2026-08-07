<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('volunteer_requests', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->string('cognome');

            $table->date('data_nascita');

            $table->string('comune_residenza');

            $table->string('telefono');

            $table->string('email');

            $table->boolean('esperienza_gatti');

            $table->unsignedTinyInteger('disponibilita_settimanale');

            $table->enum('orario', [
                'mattina',
                'pomeriggio',
                'indifferente'
            ]);

            // risposta multipla
            $table->json('come_aiutare');

            $table->text('motivazione');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_requests');
    }
};
