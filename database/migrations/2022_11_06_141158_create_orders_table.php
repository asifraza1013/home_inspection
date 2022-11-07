<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // user detail
            $table->string('inspection_date');
            $table->string('inspection_time');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('contact_number');
            $table->string('city');
            $table->string('area');
            $table->string('zip_code');
            $table->string('address');

            $table->integer('user_id')->index();
            $table->integer('agent_id')->index()->nullable();
            $table->integer('inspector_id')->index()->nullable();
            $table->integer('company_id')->index();

            $table->string('total_square');
            $table->string('square_amount');
            $table->string('total_years');
            $table->string('year_amount');
            $table->string('total');
            $table->json('item_selection')->nullable();
            $table->json('item_prices')->nullable();

            $table->string('commission_percentage')->nullable();
            $table->string('admin_commission')->nullable();

            $table->boolean('is_report_generated')->default(false);
            $table->boolean('admin_approved')->default(false);
            $table->integer('status')->default(1)->comment('1:JustCreated, 2:Scheduled, 3:InProgress, 4:Canceled, 5:Completed');

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
        Schema::dropIfExists('orders');
    }
}
