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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('fk_id_subcat');
            $table->foreign("fk_id_subcat")->references('id')->on('sub_categoria');
            $table->string("updated_at")->nullable();
            $table->string("created_at")->nullable();

            $table->unsignedBigInteger('fk_id_cat');
            $table->foreign("fk_id_cat")->references('id')->on('categoria');
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
