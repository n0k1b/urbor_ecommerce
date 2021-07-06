<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('courier_man')->unsigned();
            $table->bigInteger('deposit_received_by')->unsigned();
            $table->string('deposit_amount');
            $table->string('deposit_note')->nullable();
            $table->integer('delete_status')->default(0);
            $table->timestamps();
            $table->foreign('courier_man')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deposit_received_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposits');
    }
}
