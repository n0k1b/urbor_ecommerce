<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepageProductListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage_product_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('homepage_section_id')->unsigned();
            $table->bigInteger('product_list')->unsigned();
            $table->integer('discount_percentage');


            $table->integer('status')->default(1);
            $table->integer('delete_status')->default(0);
            $table->timestamps();
            $table->foreign('homepage_section_id')->references('id')->on('homepage_sections')->onDelete('cascade');
            $table->foreign('product_list')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homepage_product_lists');
    }
}
