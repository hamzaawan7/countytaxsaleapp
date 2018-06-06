<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAlertsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->enum('status_alert',['active', 'inactive'])->default('active');
            $table->enum('email_alert',['active', 'inactive'])->default('active');
            $table->enum('sms_alert',['active', 'inactive'])->default('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->dropColumn('status_alert');
            $table->dropColumn('email_alert');
            $table->dropColumn('sms_alert');
        });
    }
}
