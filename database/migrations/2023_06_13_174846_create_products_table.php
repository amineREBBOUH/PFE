<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('old_price');
            $table->double('new_price');
            $table->string('category');
            $table->text('pict');
            $table->unsignedBigInteger('category_id')->nullable();;
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->text('desc')->nullable();
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
        Schema::dropIfExists('products');
    }
}
