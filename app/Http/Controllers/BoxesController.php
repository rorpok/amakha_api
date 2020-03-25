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
	}
	
	/**
	* Retorna a lista de caixas cadastradas no sistema
	*
	* @return Illuminate\Http\Response
	*/
	public function getAll(){
		//lógica para retorno de todas as caixas
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