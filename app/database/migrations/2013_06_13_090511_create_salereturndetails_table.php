<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalereturndetailsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salereturndetails', function(Blueprint $table) {
            $table->increments('id');
            $table->string('productId');
			$table->string('quantity');
			$table->string('defectiveNumber');
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
        Schema::drop('salereturndetails');
    }

}
