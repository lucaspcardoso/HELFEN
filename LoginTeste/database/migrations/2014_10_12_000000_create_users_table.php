<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {


        Schema::create('users', function (Blueprint $table) {
            $table->id(); //->unique()->default(Str::uuid())->primary();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cpf_usu', 11)->default("0");
            $table->string('cnpj_usu', 14)->default("0");
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->default("https://res.cloudinary.com/duirjecnu/image/upload/v1699453992/aqrbbtskxvvuweha3mx0.png");
            $table->string('cep_end_usu', 9)->nullable()->unique();
            $table->string('rua_end_usu', 255)->nullable();
            $table->string('bairro_end_usu', 255)->nullable();
            $table->integer('num_end_usu')->nullable();
            $table->string('cdd_end_usu', 255)->nullable();
            $table->string('cell_usu', 255)->nullable();
            $table->date('dt_nasc_usu')->nullable();
            $table->string('sexo_usu')->nullable();
            $table->text("desc_usu")->nullable();
            $table->text("sobre_usu")->default(".");
            $table->decimal('avaliacao', 3, 2)->default(0);
            $table->integer("count_avaliacao")->default(0);

            $table->string("color1")->default('#000000');
            $table->string("color2")->default('#000000');
            $table->string("color3")->default('#000000');

            $table->string('created_at')->default(Carbon::now());
            $table->string('updated_at')->default(Carbon::now());
        });

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
