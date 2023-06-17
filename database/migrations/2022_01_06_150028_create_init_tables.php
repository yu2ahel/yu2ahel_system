<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateInitTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('en_name');
            $table->string('ar_name');
            $table->integer('time_zone');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->string('en_name');
            $table->string('ar_name');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('firms', function (Blueprint $table) {
            $table->id();
            $table->string('en_name');
            $table->string('ar_name');
            $table->string('ar_about_firm');
            $table->string('en_about_firm');
            $table->date('date_of_establishment');
            $table->string('tax_register_no');
            $table->string('commercial_register_no');
            $table->string('firm_classification');
            $table->string('main_branch_address');
            $table->unsignedBigInteger('main_branch_city_id');
            $table->foreign('main_branch_city_id')->references('id')->on('cities');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('contact_info', function (Blueprint $table) {
            $table->id();
            $table->morphs("contactable");
            $table->string("en_titla");
            $table->string("ar_titla");
            $table->string("registration_number");
            $table->string("phone");
            $table->string("email")->unique();
            $table->string("mobile")->unique();
            $table->string("website");
            $table->string("note");
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('firm_branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("firm_id");
            $table->string("name");
            $table->integer("working_hours")->unsigned();
            $table->foreign('firm_id')->references('id')->on('firms');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->morphs("addressable");
            $table->unsignedBigInteger("city_id");
            $table->string("area");
            $table->string("address");
            $table->string("lat_long");
            $table->foreign('city_id')->references('id')->on('cities');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("firm_id")->nullable();
            $table->string("name");
            $table->string("description");
            $table->tinyInteger("percentage_discount_for_group_service")->unsigned();
            $table->boolean("is_schedulable")->nullable();
            $table->boolean("is_plannable")->nullable();
            $table->boolean("is_attendable")->nullable();
            $table->foreign('firm_id')->references('id')->on('firms');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('service_types', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("average_time_in_minutes")->unsigned();
            $table->decimal("default_price_regular",9,3)->unsigned();
            $table->decimal("default_price_urgent",9,3)->unsigned();
            $table->decimal("default_price_discount",9,3)->unsigned();
            $table->boolean("is_freeable")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("firm_id")->default(null);
            $table->string("name");
            $table->text("brief");
            $table->text("description");
            $table->string("photo");
            $table->unsignedBigInteger("supervisor_id");
            $table->foreign('firm_id')->references('id')->on('firms');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('department_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("department_id");
            $table->unsignedBigInteger("service_id");
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('service_id')->references('id')->on('services');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("branch_id");
            $table->string("room_name");
            $table->integer("room_capacity");
            $table->foreign('branch_id')->references('id')->on('firm_branches');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('user_groups', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('user_type', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->boolean("is_dashboard_accesable")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('user_type_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_type_id");
            $table->unsignedBigInteger("service_id");
            $table->foreign('user_type_id')->references('id')->on('user_type');
            $table->foreign('service_id')->references('id')->on('services');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('service_providers', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("user_type_id");
            $table->string("photo");
            $table->string("id_number");
            $table->tinyInteger("id_type")->unsigned();
            $table->tinyInteger("gender")->unsigned();
            $table->string("about");
            $table->foreign('user_type_id')->references('id')->on('user_type');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('firm_service_providers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("firm_id");
            $table->string("job_title");
            $table->integer("basic_salary")->unsigned();
            $table->tinyInteger("default_services_percentage")->unsigned();
            $table->date("date_of_registration");
            $table->foreign('firm_id')->references('id')->on('firms');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->morphs("attachable");
            $table->string("title");
            $table->string("description");
            $table->integer("created_by")->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('service_provider_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("firm_id");
            $table->unsignedBigInteger("department_id");
            $table->unsignedBigInteger("service_type_id");
            $table->unsignedBigInteger("service_provider_id");
            $table->integer("service_provider_percentage")->unsigned();
            $table->decimal("price_regular",9,3)->unsigned();
            $table->decimal("price_urgent",9,3)->unsigned();
            $table->decimal("price_discount",9,3)->unsigned();
            $table->boolean("is_free_accepted")->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('service_type_id')->references('id')->on('service_types');
            $table->foreign('service_provider_id')->references('id')->on('service_providers');
            $table->foreign('firm_id')->references('id')->on('firms');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string("full_name");
            $table->tinyInteger("type")->unsigned();
            $table->date("date_of_birth");
            $table->string("transferred_from");
            $table->string("about");
            $table->integer("degree")->unsigned();
            $table->string("occupation");
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('firm_beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("firm_id");
            $table->unsignedBigInteger("branch_id");
            $table->unsignedBigInteger("beneficiary_id");
            $table->unsignedBigInteger("supervisor_id");
            $table->date("registration_date");
            $table->tinyInteger("status")->unsigned();
            $table->foreign('firm_id')->references('id')->on('firms');
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries');
            $table->foreign('branch_id')->references('id')->on('firm_branches');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('case_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("beneficiary_id");
            $table->string("last_diagnosis");
            $table->string("initial_diagnosis");
            $table->tinyInteger("family_social_status")->unsigned();
            $table->string("father_occupation");
            $table->string("mother_occupation");
            $table->string("escorter_name");
            $table->string("notes");
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('service_schedule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("beneficiary_id");
            $table->unsignedBigInteger("service_provider_id");
            $table->unsignedBigInteger("branch_id");
            $table->unsignedBigInteger("service_type_id");
            $table->unsignedBigInteger("department_id");
            $table->unsignedBigInteger("room_id");
            $table->timestamp("date_time");
            $table->integer("accounting_type");
            $table->integer("base_fees");
            $table->integer("extra_fees")->nullable();
            $table->string("extra_fees_note")->nullable();
            $table->integer("total_fees");
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries');
            $table->foreign('service_type_id')->references('id')->on('service_types');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('branch_id')->references('id')->on('firm_branches');
            $table->foreign('service_provider_id')->references('id')->on('service_providers');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('beneficiary_accounting_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("beneficiary_id");
            $table->tinyInteger("transaction_type")->unsigned();
            $table->decimal("amount",9,3);
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('firms');
        Schema::dropIfExists('contact_info');
        Schema::dropIfExists('firm_branches');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('services');
        Schema::dropIfExists('service_types');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('department_services');
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('user_groups');
        Schema::dropIfExists('user_type');
        Schema::dropIfExists('user_type_services');
        Schema::dropIfExists('service_providers');
        Schema::dropIfExists('firm_service_providers');
        Schema::dropIfExists('attachments');
        Schema::dropIfExists('service_provider_services');
        Schema::dropIfExists('beneficiaries');
        Schema::dropIfExists('firm_beneficiaries');
        Schema::dropIfExists('case_details');
        Schema::dropIfExists('service_schedule');
        Schema::dropIfExists('beneficiary_accounting_records');
    }
}
