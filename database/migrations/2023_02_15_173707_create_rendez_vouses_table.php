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
        Schema::create('rendez_vouses', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->Integer("phone");
            $table->unsignedBigInteger("projet_id");
            $table->unsignedBigInteger("résidence_id");
            $table->enum("status",[1,2,3]);
            $table->foreign("projet_id")->references("id")->on("projets")->cascadeOnDelete();
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
        Schema::dropIfExists('rendez_vouses');
    }
};
