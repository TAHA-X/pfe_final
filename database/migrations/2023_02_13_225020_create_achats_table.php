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
        Schema::create('achats', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger("projet_id")->nullable();
            $table->unsignedBigInteger("residence_id")->nullable();
            $table->unsignedBigInteger("immeuble_id");
            $table->unsignedBigInteger("appartement_id");
            $table->unsignedBigInteger("client_id");
            $table->foreign("projet_id")->references("id")->on("projets")->cascadeOnDelete();
            $table->foreign("residence_id")->references("id")->on("residences")->cascadeOnDelete();
            $table->foreign("immeuble_id")->references("id")->on("immeubles")->cascadeOnDelete();
            $table->foreign("appartement_id")->references("id")->on("appartements")->cascadeOnDelete();
            $table->foreign("client_id")->references("id")->on("clients")->cascadeOnDelete();
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
        Schema::dropIfExists('achats');
    }
};
