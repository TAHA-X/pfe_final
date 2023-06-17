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
        Schema::create('immeubles', function (Blueprint $table) {
            $table->id();
            $table->Integer("entrée");
            $table->Integer("num");
            $table->enum("status",["vendu","pasVendu","enCours"])->default("pasVendu");
            $table->unsignedBigInteger("residence_id");
            $table->foreign("residence_id")->references("id")->on("residences")->cascadeOnDelete();
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
        Schema::dropIfExists('immeubles');
    }
};
