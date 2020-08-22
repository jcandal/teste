<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('label', 100);
            $table->timestamps();
        });

        Schema::create('claim_role', function (Blueprint $table) {
            $table->id();
            $table->integer('claim_id')->unsigned();
            $table->integer('role_id')->unsigned();
            
            $table->foreign('claim_id')->references('id')->on('claims')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claim_role');
        Schema::dropIfExists('claims');
    }
}
