<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre o projeto

Projeto PHP desenvolvido para uma aplicação API responsável pelo CRUD de objetos os quais descritos abaixo:

- Pessoas;
- Oportunidades de vagas de emprego;
- Inscrição nas vagas;
- Listagem de inscritos nas vagas.

Obs.: O login e registro de usuário será realizado pela CRUD nativo do framework, o que agiliza o processo de desenvolvimento da aplicação
que está voltada para a demonstração da API.

## Tecnologia

| Back End | Front End |
| --------| --------|
| PHP 7.0 | Angular |
| Laravel | Bootstrap |
| MySQL | JQuery |

## API

| Method | URI |
| --------| --------|
| DELETE   | api/inscricao/{id}     |
| GET      | api/inscricoes         |
| POST     | api/inscricoes         |
| PUT      | api/oportunidade/{id}  |
| DELETE   | api/oportunidade/{id}  |
| GET      | api/oportunidades      |
| POST     | api/oportunidades      |
| PUT      | api/pessoa/{id}        |
| DELETE   | api/pessoa/{id}        |
| GET      | api/pessoas            |
| POST     | api/pessoas            |
| GET      | api/user               |

## SQL

Script SQL encontra-se na pasta psjobs/database

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
