<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_options', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('adminId');
            $table->json('detail');
            $table->integer('status')->default(1)->comment('1: Active, 2: Terminated');
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
        Schema::dropIfExists('quote_options');
    }
}
