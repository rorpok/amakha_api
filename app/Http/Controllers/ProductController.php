<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\ValidationProduct;
use App\Models\ProductModel;
use App\Models\BoxProductModel;
use App\Models\ValidationBoxProduct;
use App\Models\BoxModel;

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
		
		try{
			
			//Get todos os produtos
			$products = $this->model->all();
			
			//Checa se há produtos no banco
			if( !( count( $products ) > 0 ) )
				return response()->json( [], Response::HTTP_OK );
			
			//Return produtos no banco
			return response()->json( $products, Response::HTTP_OK );
		
		}catch( QueryException $exception ){
			
			//Trata QueryException
			return  response()->json( [ 'message' => "Erro de conexão com banco de dados." ], Response::HTTP_INTERNAL_SERVER_ERROR );
			
		}
	}
	
	/**
	* Atualiza um produto previamente cadastrado no banco de dados.
	*
	* @return lluminate\Http\Response
	*/
	public function updateProduct( Request $request, $idProduct ){
		//Lógica para update de um produto
		
		try{
			
			//Validação de dados
			$validator = Validator::make(
			
				$request->all(),
				ValidationProduct::RULE_PRODUCT
				
			);
			
			
			if( $validator->fails() )
				return response()->json( [ 'message'=> $validator->errors() ], Response::HTTP_METHOD_NOT_ALLOWED );
			
			//Busca produto
			$product = $this->model->find( $idProduct );
			
			//Verifica se o produto a ser atualizado existe
			if( !$product )
				return response()->json( [ "message"=> "Produto não encontrado." ], Response::HTTP_NOT_FOUND );
			
			//Atualiza produto
			$product->update( $request->all() );
			
			//Return OK
			return response()->json( true, Response::HTTP_OK );
		
		}catch( QueryException $exception ){
			
			//Trata QueryException
			return  response()->json( [ 'message' => "Erro de conexão com banco de dados." ], Response::HTTP_INTERNAL_SERVER_ERROR );
			
		}
		
	}
	
	/**
	* Adiciona ou atualiza uma relação entre um produto e uma caixa, informando quantos produtos desse tipo cabem na caixa
	*
	* @return lluminate\Http\Response
	*/
	public function createProductBox( $productId, Request $request ){
		//Lógica para criação de um BoxProduct
		
		try{
			
			//Validação de dados
			$validator = Validator::make(
			
				$request->all(),
				ValidationBoxProduct::RULE_BOX_PRODUCT
				
			);
			
			if( $validator->fails() )
				return response()->json(
			
					[ 'message'=> $validator->errors() ], 
					Response::HTTP_METHOD_NOT_ALLOWED 
				
				);
			
			//Verifica se o BoxProduct existe
			//TODO: Mover para camada model
			$boxProduct = BoxProductModel::where( 'idProduct', $productId )
				->where( 'idBox', $request->idBox )
				->first();
				
			if( $boxProduct ){
				
				//Atualiza BoxProduct
				$boxProduct->update( $request->all() );
				
				return response()->json(
			
					true, 
					Response::HTTP_OK 
			
				);
			}
			
			//Código a diante cria um novo BoxProduct
			
			if( !( $this->model->find( $productId ) ) ){//verifica se prduct existe
				//não
				return response()->json(
			
					[ "message" => 'Produto não encontrado.' ], 
					Response::HTTP_NOT_FOUND 
			
				);
			}
			
			if( !( ( new BoxModel() )->find( $request->idBox ) ) ){ //verifica se box existe
				//não
				return response()->json(
			
					[ "message" => 'Caixa não encontrada.'], 
					Response::HTTP_NOT_FOUND 
			
				);
			}
			
			$request->request->add( ['idProduct' => $productId] );
			BoxProductModel::create( $request->all() );
			//TODO: Checar inserção
			return response()->json(
			
					true, 
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
	* Retorna a lista de caixas para um dado produto, contendo a quantidade de produtos que cabem em cada caixa.
	*
	* @return lluminate\Http\Response
	*/
	public function getProductBoxes( $productId ){
		//Lógica para retorno de um dado BoxProduct
		
		try{
			
			//Busca lista de caixas
			$boxList = BoxProductModel::select( 'idBox' ,'howMuchFit' )
				->where('idProduct', $productId )
				->get();
			
			//Verifica se existem caixas para o produto
			if( !( count( $boxList ) > 0 ) )
				return response()->json( 
					[ "message"=> "Caixa não encontrada." ], 
					Response::HTTP_NOT_FOUND 
				);
			
			//Retorna lista de caixas
			return response()->json(
			
				$boxList, 
				Response::HTTP_OK 
			
			);
			
		
		}catch( QueryException $exception ){
			
			//Trata QueryException
			return  response()->json( 
				
				[ 'message' => "Erro de conexão com banco de dados." ], 
				Response::HTTP_INTERNAL_SERVER_ERROR 
			
			);
		
		}
		
	}
}