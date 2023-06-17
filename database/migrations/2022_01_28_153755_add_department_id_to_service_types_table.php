<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDepartmentIdToServiceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_types', function (Blueprint $table) {
            $table->unsignedBigInteger("department_id");
        });
        Schema::table('firm_service_providers', function (Blueprint $table) {
            $table->unsignedBigInteger("service_provider_id");
        });
        Schema::table('user_type', function (Blueprint $table) {
            $table->unsignedBigInteger("user_group_id");
        });
        Schema::table('service_provider_services', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropColumn("department_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_types', function (Blueprint $table) {
            $table->dropColumn("department_id");
        });
        Schema::table('firm_service_providers', function (Blueprint $table) {
            $table->dropColumn("service_provider_id");
        });
        Schema::table('user_type', function (Blueprint $table) {
            $table->dropColumn("user_group_id");
        });
        Schema::table('service_provider_services', function (Blueprint $table) {
            $table->unsignedBigInteger("department_id");
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }
}
