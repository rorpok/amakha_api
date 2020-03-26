# Getting Started

Projeto para o desafio Amakha, desenvolvido com Microframework Lumen.

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

