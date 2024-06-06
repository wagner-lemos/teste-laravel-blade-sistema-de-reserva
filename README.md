### Teste para avaliação - Laravel + Blade
<b>Objetivo:</b> O desafio consiste em criar um sistema de reserva para um único restaurante que possui 15 mesas.
#### Requisitos
```
• O sistema deverá apresentar um sistema de login;
• Reservas serão permitidas apenas das 18:00 até as 23:59, com exceção aos domingos;
• Deverá haver validações para evitar que reservas possuam horários conflituosos;
• O banco de dados deverá ser relacional - MySQL utilizado;
• o banco de dados deverá ser criado utilizando Migrations além da implementação de Seeds e Factorys para popular as informações no banco de dados;
• Painel administrativo simples contendo os dias e horários reservados, e por quem;
```
#### Instalação
```
• Versao do PHP: 8.2
• Versao do Laravel: 10.10
```
#### Clone o projeto
```
• Configure o .env
```
#### Instale as dependências
```
composer install
npm install
```
#### Rode a migrate e a seed
```
php artisan migrate
php artisan db:seed
```
#### Rodar o servidor
```
php artisan serve
```
#### Rode o Vite para o frontend
```
npm run dev
```