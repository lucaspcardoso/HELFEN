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
        Schema::table('servicos', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_id_cat');
            $table->foreign('fk_id_cat')->references('id')->on('categoria');

            $table->unsignedBigInteger('fk_id_subCat');
            $table->foreign('fk_id_subCat')->references('id')->on('sub_categoria');

            $table->dropForeign('servicos_fk_id_reg_foreign');
            $table->dropColumn('fk_id_reg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('servicos', function (Blueprint $table) {
            //
        });
    }
};
