# => SASB <=
### Sistema de auxílio de serviços e bens. Desenvolvido em PHP com o framework Laravel com o foco de auxiliar na emissão de ordens e serviços no âmbito educacionais.

Aplicação criada utilizando PHP com o framework Laravel.

Template utilizado como base -> <a href="http://opensource.locaweb.com.br/locawebstyle/documentacao/introducao/">LocaStyle</a>

Banco de dados utilizado -> MySQL


## Configurando o projeto

Após clonar o projeto, com o terminal aberto na pasta do projeto, execute o comando:

composer install --no-scripts

Renomeie então o arquivo:

.env.example

para

.env

Dentro do arquivo .env edite os campos para que fiquem como os demonstrados abaixo:

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=sasb

DB_USERNAME=root

DB_PASSWORD=1234

Obs: No lugar de "root" e "1234" coloque o usuário e a senha atribuidos na instalação do seu MySQL.

Crie então uma nova chave para a aplicação com o comando:

php artisan key:generate

Crie então no MySQL um BD (banco de dados) chamado "sasb" (caso deseje utilizar outro nome modifique também no DB_DATABASE).

Obs: O Laravel possui definido como codificação de caracteres padrão o formato utf8mb4_unicode_ci

Em seguida, no terminal aberto na pasta do projeto, execute o comando para criação das tabelas:

php artisan migrate

Pronto! Agora, para executar o sistema, utilize o comando:

php artisan serve

No navegador pode acessar o sistema através do endereço:

http://127.0.0.1:8000

ou então:

localhost:8000

Para acesso utilize:

Nome: admin@admin.com

Senha: admin123
