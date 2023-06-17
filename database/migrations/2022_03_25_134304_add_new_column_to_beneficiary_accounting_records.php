<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToBeneficiaryAccountingRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beneficiary_accounting_records', function (Blueprint $table) {
            $table->integer('firm_id')->default(null);
            // $table->foreign('firm_id')->references('id')->on('firms');
            $table->integer('created_by')->default(null);
            // $table->foreign('created_by')->references('id')->on('users');
            $table->integer('updated_by')->default(null)->nullable();
            // $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('beneficiary_accounting_records', function (Blueprint $table) {
            // $table->dropForeign('firm_id');
            $table->dropColumn('firm_id');
            // $table->dropForeign('created_by');
            $table->dropColumn('created_by');
            // $table->dropForeign('updated_by');
            $table->dropColumn('updated_by');
        });
    }
}
