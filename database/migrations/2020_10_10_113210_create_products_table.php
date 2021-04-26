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
            $table->bigIncrements('id');
            $table->integer('sub_category_id');
            $table->string('name');
            $table->string('url')->nallable();
            $table->mediumText('small_description');
            $table->string('product_image');

            $table->string('p_highlight_heading')->nallable();
            $table->string('p_highlights')->nallable();
            $table->string('p_description_heading')->nallable();
            $table->mediumText('p_description')->nallable();
            $table->string('p_details_heading')->nallable();
            $table->mediumText('p_details')->nallable();

            $table->string('sale_tag',50)->nallable();
            $table->integer('original_price')->nallable();
            $table->integer('offer_price')->nallable();
            $table->integer('quantity')->nallable();
            $table->integer('priority')->default('0');


            $table->tinyInteger('new_arrival')->default('0');
            $table->tinyInteger('featur_products')->default('0');
            $table->tinyInteger('popular_products')->default('0');
            $table->tinyInteger('offer_products')->default('0');
            $table->tinyInteger('status')->default('0');


            $table->mediumText('meta_title')->nallable();
            $table->mediumText('meta_description')->nallable();
            $table->mediumText('meta_keywords')->nallable();


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
