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
        Schema::create("languages", function (Blueprint $table) {
            $table->id();
            $table->string("name_lingua", 30);
            $table->integer("nivel_lingua");
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
        //
    }
};
