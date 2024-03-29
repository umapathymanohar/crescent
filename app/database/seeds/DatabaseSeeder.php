<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('TestingsTableSeeder');
		$this->call('ProductmastersTableSeeder');
		$this->call('ProductcategoriesTableSeeder');
		$this->call('CustomermastersTableSeeder');
		$this->call('SalesmastersTableSeeder');
		$this->call('SalesdetailsTableSeeder');
		$this->call('StockmastersTableSeeder');
		$this->call('SalesreturnsTableSeeder');
		$this->call('SalesreturndetailsTableSeeder');
		$this->call('PurchasereturndetailsTableSeeder');
		$this->call('PurchasereturnsTableSeeder');
		$this->call('PurchasemastersTableSeeder');
		$this->call('PurchasedetailsTableSeeder');
		$this->call('ProductmastersTableSeeder');
		$this->call('CustomermastersTableSeeder');
		$this->call('SuppliermastersTableSeeder');
		$this->call('SalesTableSeeder');
		$this->call('SaledetailsTableSeeder');
		$this->call('StocksTableSeeder');
		$this->call('SalereturnsTableSeeder');
		$this->call('SalereturndetailsTableSeeder');
		$this->call('PurchasereturnsTableSeeder');
		$this->call('PurchasereturndetailsTableSeeder');
		$this->call('PurchasesTableSeeder');
		$this->call('PurchasedetailsTableSeeder');
	}

}