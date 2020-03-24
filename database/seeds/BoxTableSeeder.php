<?php

use Illuminate\Database\Seeder;

class BoxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'box' )->insert([
			
			[ 'idBox'=> 1, 'name'=> "Caixa 1" ],
			[ 'idBox'=> 2, 'name'=> "Caixa 2" ],
			[ 'idBox'=> 3, 'name'=> "Caixa 3" ],
		
		]);
    }
}
