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
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->string('name_work', 40);
            $table->text("descr_work");
            $table->string("rua_end_work")->nullable();
            $table->string("bairro_end_work")->nullable();
            $table->decimal("num_end_work", 10, 2)->nullable();
            $table->integer("duracao_work");
            $table->string('type_work');
            $table->decimal('price_work', 10, 2);
            $table->integer('desconto_work')->nullable();


            // new
            $table->string('image1', 2048)->nullable();
            $table->string('image2', 2048)->nullable();
            $table->string('image3', 2048)->nullable();


            $table->unsignedBigInteger("fk_id_usu");
            $table->foreign("fk_id_usu")->references('id')->on("users");

            $table->unsignedBigInteger("fk_id_reg");
            $table->foreign("fk_id_reg")->references('id')->on('registros');
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
