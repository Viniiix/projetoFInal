<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('name');
            $table->decimal('price', 11, 2);
            $table->integer('minimum_quantity');
            $table->text('description');
            $table->text('instructions');
            $table->string('url_image');
            $table->string('link_file');
            $table->boolean('active');
            $table->boolean('featured');
            $table->timestamps();
            $table->foreign('category_id')->references('id')
                    ->on('categories')->onUpdate('cascade')
                    ->onDelete('set null');
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
