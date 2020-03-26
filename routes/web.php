<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group( [ 'prefix' => '/box' ], function() use ( $router ){ 
		
	$router->post( "/", "BoxesController@insertBox" );
	$router->get( "/", "BoxesController@getAll" );
	$router->put( "/{idBox}", "BoxesController@updateBox" );

});

$router->group( [ 'prefix' => '/product' ], function() use ( $router ){ 
		
	$router->post( "/", "ProductController@createProduct" );
	$router->get( "/", "ProductController@getProduct" );
	$router->put( "/{productdId}", "ProductController@updateProduct" );
	$router->post( "/{productId}/box", "ProductController@createProductBox" );
	$router->get("/{productId}/box", "ProductController@getProductBoxes");
	

});
