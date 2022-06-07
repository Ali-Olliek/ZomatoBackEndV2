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
    public function up(){
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table ->bigInteger("reviews_user_id_foreign")->unsigned();
            $table ->bigInteger("restaurant_id")->unsigned();
            // https://stackoverflow.com/a/33633739/18590539
            $table->foreign('reviews_user_id_foreign')->references('id')->on('users');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            // https://stackoverflow.com/a/26437469/18590539
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
        Schema::dropIfExists('reviews');
    }
};
