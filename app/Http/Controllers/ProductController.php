<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\ValidationProduct;
use App\Models\ProductModel;

class ProductController extends Controller
{
    
	private $model;
	
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( ProductModel $product )
    {
        $this->model = $product;
    }

    /**
	* Insere um novo produto no banco de dados.
	*
	* @return Illuminate\Http\Response
	*/
	public function createProduct( Request $request ){
		//Lógica para inserção de um novo produto
		
		try{
			
			//Validação de dados
			$validator = Validator::make( 
			
				$request->all(),
				ValidationProduct::RULE_PRODUCT
				
			);
			
			if( $validator->fails() )
				return response()->json( 
					
					[ 'message'=> $validator->errors() ], 
					Response::HTTP_METHOD_NOT_ALLOWED
				
				);
			
			//Criação do registro
			$product = $this->model->create( $request->all() );
			
			//Return id do novo registro
			return response()->json( 
				[ "id" => $product->idProduct ], 
				Response::HTTP_CREATED 
			);
		
		}catch( QueryException $exception ){
			
			//Trata QueryException
			return  response()->json( 
				
				[ 'message' => "Erro de conexão com banco de dados." ], 
				Response::HTTP_INTERNAL_SERVER_ERROR 
			
			);
			
		}
	}
	
	/**
	* Retorna lista de produtos previamente cadastrados.
	*
	* @return lluminate\Http\Response
	*/
	public function getProduct(){
		//Lógica para retorno dos produtos cadastrados
		return "getProduct";
	}
	
	/**
	* Atualiza um produto previamente cadastrado no banco de dados.
	*
	* @return lluminate\Http\Response
	*/
	public function updateProduct(){
		//Lógica para update de um produto
		return "updateProduct";
	}
	
	/**
	* Adiciona ou atualiza uma relação entre um produto e uma caixa, informando quantos produtos desse tipo cabem na caixa
	*
	* @return lluminate\Http\Response
	*/
	public function createProductBox(){
		//Lógica para criação de um BoxProduct
		return "createProductBox";
	}
	
	/**
	* Retorna a lista de caixas para um dado produto, contendo a quantidade de produtos que cabem em cada caixa.
	*
	* @return lluminate\Http\Response
	*/
	public function getProductBoxes(){
		//Lógica para retorno de um dado BoxProduct
		return "getProductBoxes";
	}
}