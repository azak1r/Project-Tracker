<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTableForEveSso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Adds
            $table->char('eve_token', 255);
            $table->char('refreshToken', 255);
            $table->char('username', 50);
            $table->char('avatar', 255);
            $table->softDeletes();
            // Drops
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('password');
            $table->dropColumn('email_verified_at');
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
            $table->dropColumn('eve_token');
            $table->dropColumn('username');
            $table->dropColumn('deleted_at');
            $table->dropColumn('avatar');
            // Reset to original table structure to prevent issues
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
        });
    }
}
