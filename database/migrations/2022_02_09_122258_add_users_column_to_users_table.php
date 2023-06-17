<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_providers', function (Blueprint $table) {
            $table->integer('user_id')->default(null);
        });
        Schema::table('firms', function (Blueprint $table) {
            $table->integer('user_id')->default(null);
        });
        Schema::table('user_groups', function (Blueprint $table) {
            $table->integer('firm_id')->default(null);
        });
        Schema::table('firm_service_providers', function (Blueprint $table) {
            $table->integer('user_type_id')->default(null);
        });
        Schema::table('service_providers', function (Blueprint $table) {
            $table->dropForeign(['user_type_id']);
            $table->dropColumn("user_type_id");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_providers', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
        Schema::table('firms', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
        Schema::table('user_groups', function (Blueprint $table) {
            $table->dropColumn('firm_id');
        });
        Schema::table('firm_service_providers', function (Blueprint $table) {
            $table->dropColumn('user_type_id');
        });
        Schema::table('service_providers', function (Blueprint $table) {
            $table->integer("user_type_id")->default(null);
        });
    }
}
