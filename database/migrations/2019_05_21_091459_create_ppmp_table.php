<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpmpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppmp', function (Blueprint $table) {
            $table->bigIncrements('ppmp_id');
            $table->unsignedBigInteger('cc_id');
            $table->unsignedBigInteger('fs_id');
            $table->unsignedBigInteger('account_id');

            $table->foreign('cc_id')->references('cc_id')->on('cost_center');
            $table->foreign('fs_id')->references('fs_id')->on('fund_source');
            $table->foreign('account_id')->references('account_id')->on('account');

            $table->string('type', 15);
            $table->timestamp('year');
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
        Schema::dropIfExists('ppmp');
    }
}
