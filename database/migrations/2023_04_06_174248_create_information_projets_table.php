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
        Schema::create('information_projets', function (Blueprint $table) {
            $table->id();
            $table->string("email");
            $table->bigInteger("phone");
            $table->text("adress");
            $table->text("localisation");
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
        Schema::dropIfExists('information_projets');
    }
};
