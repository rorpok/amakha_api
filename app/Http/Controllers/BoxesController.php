<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\ValidationBox;
use App\Models\BoxModel;

class BoxesController extends Controller
{
    
	private $model;
	
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( BoxModel $box ) 
    {
        $this->model = $box;
    }
	
	/**
	* Insere uma nova caixa no banco de dados
	*
	* @return Illuminate\Http\Response
	*/
    public function insertBox( Request $request ){
		//Lógica para inserção de nova caixa
		
		try{
			
			//Validação de dados
			$validator = Validator::make(
			
				$request->all(),
				ValidationBox::RULE_BOX
				
			);
			
			if( $validator->fails() )
				return response()->json( [ 'message'=> $validator->errors() ], Response::HTTP_METHOD_NOT_ALLOWED );
			
			//Criação do registro
			$box = $this->model->create( $request->all() );
			
			//Return id do novo registro
			return response()->json( [ "id" => $box->idBox ], Response::HTTP_CREATED );
		
		}catch( QueryException $exception ){
			
			//Trata QueryException
			return  response()->json( [ 'message' => "Erro de conexão com banco de dados." ], Response::HTTP_INTERNAL_SERVER_ERROR );
			
		}
			
	}
	
	/**
	* Retorna a lista de caixas cadastradas no sistema
	*
	* @return Illuminate\Http\Response
	*/
	public function getAll(){
		//lógica para retorno de todas as caixas
		
		try{
			
			//Get todas as caixas
			$boxes = $this->model->all();
			
			//Checa se há caixas no banco
			if( !( count( $boxes ) > 0 ) )
				return response()->json( [], Respose::HTTP_OK );
			
			//Return caixas no banco
			return response()->json( $boxes );
		
		}catch( QueryException $exception ){
			
			//Trata QueryException
			return  response()->json( [ 'message' => "Erro de conexão com banco de dados." ], Response::HTTP_INTERNAL_SERVER_ERROR );
			
		}
	}
	
	/**
	* Atualiza uma caixa previamente cadastrada no banco de dados
	*
	* @return Illuminate\Http\Response
	*/
	public function updateBox( $idBox, Request $request ){
		//lógica para update de uma caixa
	}
}