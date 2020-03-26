<?php
	/**
	* Dada uma relação de de quantos produtos cabem 
	* em cada tipo de caixa e uma relação de produtos, de cada
	* tipo, a serem alocados, calcula quantas 
	* caixas são necessárias para armazenas todos os produtos.
	*
	* @param $caixas Uma matriz contendo a relação de caixas e quantidade de produtos, de 
	* cada tipo, que elas comportam.
	* Tome como exemplo a seguinte matriz [ [50,100,20], [30,10,40], [80,20,15] ].
	* Isso quer dizer que a caixa 1 tem 50 unidades do produto 1, 100 unidades do produto 2
	* e 20 unidades do produto 3, enquanto a caixa 2 tem 30 unidades do produto 1, 10 
	* unidades do produto 2, e assim por diante.
	*
	* @param $cenario Um array contento a relação de produtos a serem alocados nas caixa.
	* Tome como exemplo [200, 50, 10, 0, 0]
	* Isso quer dizer que deseja-se alocar 200 unidades do produto 1, 50 unidades do produto 2,
	* e 10 unidades do produto 3
	*
	* @return quantidade de caixas necessárias para comportar os produtos.
	*/
	function calculaMenorSolucao( $caixas, $cenario ){
		
		//Prepara variáveis
		
		$solucao = array();
		$v = array();
		
		for( $i=0; $i < count( $cenario ); $i++){
			$solucao[] = 0;
		}
		
		for( $i=0; $i < count( $caixas ); $i++ ){
			$v[] = 0;
		}
		
		$i = -1; //Número de caixas que serão utilizadas 
		
		while ( true ){ //enquanto a solução não for maior que o cenário continua...
			
			$i++; //Será utilizada pelo menos uma caixa, e caso o loop se repita significa que será necessário pelo menos mais uma caixa e assim sucessivamente
			
			$tentativas = geraVetoresComSoma( count( $caixas ), $i );
			
			
			echo "geraVetoresComSoma( ". count( $caixas ) .", $i )".'</br>';
			
			// Para cada um dos vetores soma, vemos se a solução que ele dá resolve o problema
			foreach( $tentativas as $v ){
				
				$solucao = multiplicaDuasMatrizes( array( $v ), $caixas ); //Realiza uma multiplicação de matrizes
				
				if( comparaCoordenadas( $solucao[0], $cenario ) ){ 
					//Caso seja uma solução
					echo "<p> Serão necessárias ". $i. " caixas </p>";
					return $v;
				}
			
			}
			
		}
	
	}
	
	/**
	* Retorna todos vetores de tamanho n cuja soma seja s.
	* Por exemplo se n = 2 e s = 3 ele deve retornar:
	* { (3,0), (0,3), (2,1), (1,2) }
	*
	* @param $n tamanho de n
	* @param $s tamanho de s
	*
	* @return matriz com todos os vetores de tamanho n cuja soma seja s.
	*/
	function geraVetoresComSoma( $n, $s ){
		
		//Define variáveis a serem utilizadas do processamento
		$resposta = array(); //Matriz a ser retornada
		$soma_restante = 0;
		$novo_elemento = array();
		
		//Verifica se o tamanho dos vetores deve ser n = 1
		if( $n == 1 ){
			//Sim
			$resposta[] = array( $s ); // Se o tamanho do vetor é 1, só existe uma resposta possível.
			return $resposta;
		
		}
		
		//Verifica se a soma dos vetores deve ser s = 0
		if( $s == 0 ){
			//sim, a soma deve dar 0 
			for( $i=0; $i < $n; $i++ ){
				$aux[] = 0; //Se a soma deve dar 0 então o vetor é nulo.
			}
			$resposta[] = $aux;
			return $resposta;
		}
		
		for( $i=0; $i <= $s ; $i++ ){
			
			$novo_elemento = array( $i );
			$soma_restante = $s-$i; 
			$restantes = geraVetoresComSoma( $n-1, $soma_restante );

			
			foreach( $restantes as $v ){
				
				$novo_elemento = array_merge( $novo_elemento, $v );
				$resposta[] = $novo_elemento;
				$novo_elemento = array( $i );
				
			}
			
		}
		return $resposta;
	}
	
	/**
	* Dada duas matrizes realiza uma multiplicação entre ambas
	*
	* @param $a Matriz a ser multiplicada
	* @param $b Matriz a ser multiplicada
	*
	* @return Matriz resultante da multiplicação
	*/
	function multiplicaDuasMatrizes( $a, $b ){
		
		$m=count($a);
		$n=count($a[ ( count( $a ) - 1 ) ]);
		$p=count($b);
		$q=count($b[ ( count( $b ) - 1 ) ]);


		$result=array();
		for ( $i=0; $i < $m; $i++ ) {
			
			for( $j=0; $j < $q; $j++ ){
			
				$result[$i][$j] = 0;
				for( $k=0; $k < $n; $k++ )
					$result[$i][$j] += $a[$i][$k] * $b[$k][$j];
			
			}
		}

		return $result;
		
	}
	
	/**
	* Dado dois vetores verifica se todas as coordenadas do primeiro são maiores, ou 
	* iguais, às respectivas coordenadas do segundo vetor
	*
	* @param $vetor1 primeiro vetor
	* @param $vetor2 segundo vetor
	*
	* @return true se todas as coordenas do $vetor1 forem  
	* maior, ou igual, às respectivas coordenadas do $vetor2 
	* e false caso contrário
	*/
	function comparaCoordenadas( $vetor1, $vetor2 ){
		
		$i = 0;
		foreach( $vetor1 as $v ){
			if( $v < $vetor2[ $i ] )
				return false;
			$i++;
		}
		
		return true;
	
	}