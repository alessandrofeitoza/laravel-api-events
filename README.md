# SETUP LARAVEL / MYSQL

Uma base de aplicação laravel, com Docker, Nginx e Mysql para estudos em PHP Orientado a objetos, com o framework Laravel.

Essa estrutura já está dockerizada, então basta ter o docker compose rodando em seu computador que é pra dar tudo certo.

## Tecnologias

- PHP 8.3
- MySQL
- nginx
- Laravel 11

## Como usar

Primeiro basta clonar o repositório

`git clone https://github.com/alessandrofeitoza/laravel-api-events`

Agora entre na pasta com o terminal 
`cd laravel-api-events`

E agora basta rodar o docker

`docker compose up -d`

Pronto,é sucesso!

## Instalar

Entre no container:

`docker compose exec php bash`

E execute o composer install:

`composer install`

Para executar as migrations
`php artisan migrate`

Para executar criar alguns dados falsos
`php artisan db:seed`



Pronto, agora acesse o http://localhost:8080

---

### Schema do Banco de Dados

```mermaid
flowchart TD
    EventType --> Event*
    RoomType --> Room
    Room-->Event*
    Space-->Room
```

--- 
Esquema de autorizacao do usuario;

```mermaid
classDiagram
    perfis_users --> User  
    perfis_users --> Perfil 

    Permissao --> Action
    Permissao --> Resource

    perfis_permissoes --> Perfil
    perfis_permissoes --> Permissao 

    class User {
        - int $id
        + string $name
        + string $password
    }

    class perfis_users {
        + user_id
        + perfil_id
    }

    class Perfil {
        - int $id
        + string $nome (Admin, Comum)
    }

    class perfis_permissoes {
        + int $resource_id
        + int $perfil_id
    }

    class Permissao {
        - int $id
        + string $description (add_space, retrieve_spaces)
        + int $resource_id
        + int $action_id
    }

    class Resource {
        - int $id
        + string $name
    }

    class Action{
        - int $id
        + string $name
    }

```
