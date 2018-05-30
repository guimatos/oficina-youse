<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartsInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sinister');
            $table->string('vehicle_plate');
            $table->string('office_email');
            $table->string('office_telephone');
            $table->string('office_document');
            $table->string('bank');
            $table->string('agency');
            $table->string('account');
            $table->text('invoice_parts');
            $table->text('invoice_services');
            $table->text('discharge_term');
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
        Schema::drop("parts_invoices");
    }
}
