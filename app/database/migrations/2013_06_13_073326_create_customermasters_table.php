<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomermastersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customermasters', function(Blueprint $table) {
            $table->increments('id');
            $table->string('customerName');
			$table->string('customerAddressLine1');
			$table->string('customerAddressLine2');
			$table->string('customerCity');
			$table->string('customerState');
			$table->string('customerCountry');
			$table->string('customerPinCode');
			$table->string('customerEmail');
			$table->string('customerCSTNumber');
			$table->string('customerVATNumber');
			$table->string('customerSTNumber');
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
        Schema::drop('customermasters');
    }

}
