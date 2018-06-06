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
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->longText('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('precinct')->nullable();
            $table->string('sale')->nullable();
            $table->string('account')->nullable();
            $table->string('cause')->nullable();
            $table->dateTime('judgment')->nullable();
            $table->string('tax_years')->nullable();
            $table->string('hcad')->nullable();
            $table->string('min_bid')->nullable();
            $table->string('adjudged_value')->nullable();
            $table->string('image_url')->nullable();
            $table->longText('description')->nullable();
            $table->date('auction_start')->nullable();
            $table->date('auction_end')->nullable();
            $table->enum('type', ['SALE','RESALE'])->default('SALE');
            $table->enum('status', ['active', 'cancelled', 'remove'])->default('active');
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
