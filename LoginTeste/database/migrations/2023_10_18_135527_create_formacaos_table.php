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
        Schema::create('formacaos', function (Blueprint $table) {
            $table->id();
            $table->string("nm_curso_form", 30)->nullable();
            $table->string('nm_uni_form', 60)->nullable();
            $table->text("desc_curso");
            $table->string('updated_at');
            $table->string('created_at');

            $table->unsignedBigInteger('fk_id_usu');
            $table->foreign("fk_id_usu")->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formacaos');
    }
};
