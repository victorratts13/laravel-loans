<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('ip')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('cep')->nullable();
            $table->string('perfilFile')->nullable();
            $table->string('docFile1')->nullable();
            $table->string('docFile2')->nullable();
            $table->string('compAddress')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            //$table->string('verify');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('ocupation')->nullable();
            $table->string('reputation')->nullable();
            $table->string('accessType')->nullable();
            $table->string('registerFrom')->nullable();
            $table->string('manegeFrom')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
