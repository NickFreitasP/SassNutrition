<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nutritionist_id')->constrained('users');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string("phone")->nullable();
            $table->string("image")->nullable();
            $table->date('birth_date')->nullable();
            $table->decimal('height', 5, 2)->nullable();
            $table->integer("age")->nullable();
            $table->text('notes')->nullable();
            $table->enum("objective",["Emagrecimento","Hipertrofia","Definição","Manutenção","Recomposta Corporal"])->nullable();
            $table->text("dietary_restrictions")->nullable();
            $table->enum("gender",["M","F","O"]);
            $table->enum("food_preferences",["Vegetariano","Low Carb","Sem Glúten"])->nullable();
            $table->text("observations")->nullable();
            $table->string("occupation")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
