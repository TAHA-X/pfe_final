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
        Schema::create('plan_projets', function (Blueprint $table) {
            $table->id();
            $table->integer("chambre");
            $table->integer("salon");
            $table->integer("cuisine");
            $table->integer("balcon")->default(0);
            $table->integer("sall_bain");
            $table->unsignedBigInteger("projet_id");
            $table->foreign("projet_id")->references("id")->on("setting_projets_pages")->cascadeOnDelete();
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
        Schema::dropIfExists('plan_projets');
    }
};
