<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductmastersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productmasters', function(Blueprint $table) {
            $table->increments('id');
            $table->string('productCode');
			$table->string('productName');
			$table->string('productCategoryName');
			$table->string('productPrice');
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
        Schema::drop('productmasters');
    }

}
