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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->index("user_id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index("resto_id");
            $table->foreign('user_id')->references('id')->on('restaurants')->onDelete('cascade');
            // https://stackoverflow.com/a/26437469/18590539
            $table->text('description');
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
