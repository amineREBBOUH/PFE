<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keys', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('key')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->unique()->nullable();
            $table->enum('status', ["bought","not_yet"])->default("not_yet")->nullable();
            // $table->primary(['id', 'key']);
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
        Schema::dropIfExists('keys');
    }
}
