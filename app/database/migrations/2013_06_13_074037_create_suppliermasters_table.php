<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuppliermastersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliermasters', function(Blueprint $table) {
            $table->increments('id');
            $table->string('supplierName');
			$table->string('supplierAddressLine1');
			$table->string('supplierAddressLine2');
			$table->string('supplierCity');
			$table->string('supplierState');
			$table->string('supplierCountry');
			$table->string('supplierPinCode');
			$table->string('supplierEmail');
			$table->string('supplierCSTNumber');
			$table->string('supplierVATNumber');
			$table->string('supplierSTNumber');
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
        Schema::drop('suppliermasters');
    }

}
