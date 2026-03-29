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
        Schema::create('cats', function (Blueprint $table) {
            $table->id();

            $table->string('slug', 255);
            $table->string('name', 255);

            $table->enum('sex', ['M', 'F']);

            $table->char('date_of_birth', 7)->nullable();

            $table->string('coat', 100)->nullable();
            $table->string('image', 255)->nullable();

            $table->text('info')->nullable();

            $table->boolean('adottato')->default(false);
            $table->boolean('prenotato')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cats');
    }
};
