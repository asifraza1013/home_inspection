<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompniesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compnies_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->string('company_name')->nullable()->unique();
            $table->string('per_square')->nullable()->default(300);
            $table->string('per_year')->nullable()->default(500);
            $table->string('email')->nullable()->unique();
            $table->json('payment_detail')->nullable();
            $table->json('pricing')->nullable();
            $table->longText('description')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('compnies_details');
    }
}
