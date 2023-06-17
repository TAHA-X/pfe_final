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
        Schema::create('setting_projets_pages', function (Blueprint $table) {
            $table->id();
            $table->text("img");
            $table->string("title");
            $table->text("description");
            $table->string("ville");
            $table->unsignedBigInteger("residence_id");
            $table->foreign("residence_id")->references("id")->on("residences");
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
        Schema::dropIfExists('setting_projets_pages');
    }
};
