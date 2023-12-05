<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profissionals', function (Blueprint $table) {
            $table->id();   //string('pk_id_prof')->unique()->default(DB::raw('NEWID()'));
            $table->string('cpf_prof', 12)->nullable();
            $table->string('cnpj_prof', 15)->nullable();
            $table->string('password', 60);
            $table->string('email', 100)->unique();
            $table->string('nm_prof', 50);
            $table->string('cep_end_prof', 8);
            $table->string('rua_end_prof', 50);
            $table->string('bairro_end_prof', 40);
            $table->integer('num_end_prof');
            $table->string('cdd_end_prof', 30);
            $table->string('cel_prof', 12);
            $table->date('dt_nasc_prof');
            $table->string('genero_prof');
            $table->string('created_at')->default(Carbon::now())->nullable();
            $table->string('updated_at')->default(Carbon::now())->nullable();
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
