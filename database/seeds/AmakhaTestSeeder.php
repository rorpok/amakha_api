<?php

use Illuminate\Database\Seeder;

class AmakhaTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
			
			ProductTableSeeder::class,
			BoxTableSeeder::class,
			BoxProductTableSeeder::class,
		
		]);
    }
}
