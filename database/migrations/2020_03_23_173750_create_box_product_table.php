<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('box_product', function (Blueprint $table) {
			
			$table->integer( 'idProduct' )->unsigned();
			$table->integer( 'idBox' )->unsigned();
			$table->integer( 'howMuchFit' )->unsigned();
			$table->primary( [ 'idProduct', 'idBox' ] );
            
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('box_product');
    }
}
