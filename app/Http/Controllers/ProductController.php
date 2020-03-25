<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
	* Insere um novo produto no banco de dados.
	*
	* @return Illuminate\Http\Response
	*/
	public function createProduct(){
		//Lógica para inserção de um novo produto
		return "createProduct";
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