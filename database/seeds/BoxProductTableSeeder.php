<?php

use Illuminate\Database\Seeder;

class BoxProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'box_product' )->insert([
			
			[ 'idProduct'=> 1, 'idBox'=> 1, 'howMuchFit'=> 25 ],
			[ 'idProduct'=> 1, 'idBox'=> 2, 'howMuchFit'=> 50 ],
			[ 'idProduct'=> 1, 'idBox'=> 3, 'howMuchFit'=> 100 ],
			[ 'idProduct'=> 2, 'idBox'=> 1, 'howMuchFit'=> 10 ],
			[ 'idProduct'=> 2, 'idBox'=> 2, 'howMuchFit'=> 20 ],
			[ 'idProduct'=> 2, 'idBox'=> 3, 'howMuchFit'=> 40 ],
			[ 'idProduct'=> 3, 'idBox'=> 1, 'howMuchFit'=> 2 ],
			[ 'idProduct'=> 3, 'idBox'=> 2, 'howMuchFit'=> 10 ],
			[ 'idProduct'=> 3, 'idBox'=> 3, 'howMuchFit'=> 25 ],
			[ 'idProduct'=> 4, 'idBox'=> 1, 'howMuchFit'=> 2 ],
			[ 'idProduct'=> 4, 'idBox'=> 2, 'howMuchFit'=> 10 ],
			[ 'idProduct'=> 4, 'idBox'=> 3, 'howMuchFit'=> 25 ],
			[ 'idProduct'=> 5, 'idBox'=> 1, 'howMuchFit'=> 100 ],
			[ 'idProduct'=> 5, 'idBox'=> 2, 'howMuchFit'=> 200 ],
			[ 'idProduct'=> 5, 'idBox'=> 3, 'howMuchFit'=> 500 ]
			
		]);
    }
}
