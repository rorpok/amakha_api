# Getting Started

Projeto para o desafio Amakha, desenvolvido com Microframework Lumen.

## Sobre a rota /order/boxes

A lógica de alocação de produtos não foi implementada a tempo.
Este consiste num problema de programação linear, e poderia ser resolvido com a implementação do algoritmo Simplex, ou com alguma de suas variações (minha abordagem).
Apesar de não conseguir concluir o algoritmo de alocação a tempo mantive um rascunho do mesmo em /App/Models/algoritmoAlocacao.php
assim pode-se ter um insight de qual seria minha abordagem para solucionar o problema em questão.

Essa solução é altamente NP, mas a alocação de memória é polinomial. 
Se muitos dos pedidos fossem matrizes com muitos zeros, na pratica, usaria uma outra classe de de algoritmos, usar as chamadas matrizes esparsas. 
De qualquer forma, existem heurísticas que vão resolver a maioria dos casos, mas essa solucão que rascunhei, apesar de lenta, resolveria todos.
Em um cenário mais realístico eu poderia, ainda, analisar a entrada, e decidir por qual algoritmo utilizar, semelhante a abordagem utilizada pelo algoritmo de busca do Google.

## Iniciando o Projeto

Clone o repositório

`git clone https://github.com/rorpok/amakha_api.git`

Para instalar as dependências acesse o root do projeto e aplique o comando:

`composer install`

Aplique o comando:

`composer dump-autoload`

A aplicação deste comando pode ser eliminada atualizando adequadamente o `composer.json`, todavia será preciso aplica-lo neste teste.

## Configurando o Banco de Dados

Crie um arquivo `.env` e copie o conteúdo do arquivo `.env.example` para este novo arquivo, após isso adicione este arquivo ao root do projeto.
Altere as informações de conexão com o banco de dados do arquivo `.env` para que a API possa conectar-se ao seu banco.

Execute as Migrations para criar as tabelas da aplicação:

`php artisan migrate`

Caso as tabelas já existam no banco de dados aplique o seguinte comando para remover e recria-las:

`php artisan migrate:fresh`

Execute o Seeder para povoar as tabelas com os dados do desafio Amakha:

`php artisan db:seed --class=AmakhaTestSeeder`

