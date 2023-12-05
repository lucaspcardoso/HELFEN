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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string("nm_empresa_trab", 30);
            $table->integer("tempo_exp_trab");
            $table->text('desc_trab');
            $table->string("cargo_empre_trab", 20);
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
        Schema::dropIfExists('experiences');
    }
};
