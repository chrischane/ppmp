<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpmpItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppmp_item', function (Blueprint $table) {
            $table->bigIncrements('ppmp_item_id');
            $table->unsignedBigInteger('ppmp_id');
            $table->unsignedBigInteger('item_id');

            $table->foreign('ppmp_id')->references('ppmp_id')->on('ppmp');
            $table->foreign('item_id')->references('item_id')->on('item');

            $table->string('quarter', 25);
            $table->integer('amount');
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->string('remarks', 15)->nullable();
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
        Schema::dropIfExists('ppmp_item');
    }
}
