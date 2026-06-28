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
        Schema::create('receipt_requests', function (Blueprint $table) {
            $table->id();
            $table->string('cognome');
            $table->string('nome');
            $table->string('email');
            $table->string('cf', 16);
            $table->string('via');
            $table->string('civico');
            $table->string('citta');
            $table->string('cap', 5);
            $table->decimal('importo', 8, 2)->nullable();
            $table->text('messaggio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt_requests');
    }
};
