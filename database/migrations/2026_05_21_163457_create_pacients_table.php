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
        Schema::create('pacients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nutritionist_id')->constrained('users');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string("phone")->nullable();
            $table->decimal("weight",5,2)->nullable();
            $table->date('birth_date')->nullable();
            $table->decimal('height', 5, 2)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacients');
    }
};
