<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("prénom");
            $table->string("nom");
            $table->string("age");
            $table->enum("sex",["homme","femme"]);
            $table->Integer("phone");
            $table->string("email")->nullable();
            $table->unsignedBigInteger("résidence_id");
            $table->foreign("résidence_id")->references("id")->on("residences")->cascadeOnDelete();
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
        Schema::dropIfExists('clients');
    }
};
