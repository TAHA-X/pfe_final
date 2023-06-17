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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("logo")->nullable();
            $table->text("facebook")->nullable();
            $table->text("instagram")->nullable();
            $table->text("linkedin")->nullable();
            $table->string("contactImg")->nullable();
            $table->string("projetsImg")->nullable();
            $table->bigInteger("phone")->default("0658843130");
            $table->string('email')->default("achorouk@gmail.com");
            $table->text("adresse")->default("Rabat adarissa 145,20000");
            $table->text("localisation")->default("https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105885.03761001195!2d-6.857262799999999!3d33.969218850000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda76b871f50c5c1%3A0x7ac946ed7408076b!2sRabat!5e0!3m2!1sfr!2sma!4v1683227119921!5m2!1sfr!2sma");
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
        Schema::dropIfExists('settings');
    }
};
