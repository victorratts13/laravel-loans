<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Loans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpf');
            $table->string('userId');
            $table->string('colabId');
            $table->string('colabName');
            $table->string('colabAccess');
            $table->string('uniqHash');
            $table->string('codeHash');
            $table->string('value');
            $table->string('parcels');
            $table->string('period');
            $table->string('jurs');
            $table->string('delayAcres');
            $table->string('uteis');
            $table->string('status');
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
        Schema::dropIfExists('loans');
    }
}
