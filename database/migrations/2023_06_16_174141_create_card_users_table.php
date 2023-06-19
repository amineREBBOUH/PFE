<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id')->nullable();
            $table->foreign('card_id')
            ->references('id')
            ->on('cards')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('card_users');
    }
}
