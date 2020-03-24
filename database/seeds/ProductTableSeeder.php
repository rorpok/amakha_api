<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'product' )->insert([
		
			[ 'idProduct' => 1, 'code' => "0001-P", 'name' => "Perfume 15ml Amakha" ],
			[ 'idProduct' => 2, 'code' => "0002-P", 'name' => "Perfume 100ml Amakha" ],
			[ 'idProduct' => 3, 'code' => "0003-C", 'name' => "Shampoo Amakha" ],
			[ 'idProduct' => 4, 'code' => "0004-C", 'name' => "Condicionador Amakha" ],
			[ 'idProduct' => 5, 'code' => "0005-M", 'name' => "Lápis de olho" ],
        
		]);
    }
}
