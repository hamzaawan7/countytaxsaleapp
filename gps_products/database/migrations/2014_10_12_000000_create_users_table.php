<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email','175')->unique();
            $table->binary('photo')->nullable();
            $table->string('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->longText('descripton')->nullable();
            $table->string('is_premium')->nullable();
            $table->dateTime('expiration_date')->nullable();
            $table->enum('status',['active', 'inactive', 'block', 'remove'])->default('active');
            $table->enum('type',['user', 'premium', 'admin'])->default('user');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
