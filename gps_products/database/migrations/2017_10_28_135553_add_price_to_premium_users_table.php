<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceToPremiumUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('premium_users', function (Blueprint $table) {
            //
            $table->enum('status',['trial', 'premium'])->default('trial');
            $table->string('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('premium_users', function (Blueprint $table) {
            //
            $table->dropColumn('price');
            $table->dropColumn('status');
        });
    }
}
