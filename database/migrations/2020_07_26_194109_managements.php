<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Managements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managements', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone');
            $table->string('cpf');
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->string('cep');
            $table->string('accessType');
            $table->string('userId');

            $table->string('banca');
            $table->string('place')->nullable();
            $table->string('returns')->nullable();
            $table->string('total')->nullable();
            $table->string('clients')->nullable();
            $table->string('reputation')->nullable();
            
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
        Schema::dropIfExists('managements');
    }
}
