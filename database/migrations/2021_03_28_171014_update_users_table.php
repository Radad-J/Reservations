<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('login', 30);
            $table->string('firstname', 60);
            $table->string('lastname', 60);
            $table->string('language', 2);

            $table->dropColumn('name');
            $table->dropColumn('email_verified_at');
            /*$table->dropColumn('remember_token');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');*/
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
            $table->dropColumn('login');
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('language');
        });

        Schema::dropIfExists('users');
    }
}
