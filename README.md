# API Carros

This project was built with Lumen Framework

## Step 01

```
git clone https://github.com/rserrano0903/sensedia_teste.git
```

## Step 02

Create your database with Sqlite or other

## Step 03

Copy `.env` file

```cp .env.example .env```

## Step 04

Configure your database with your credentials. After configure the `.env` file.


### For SQLITE edit line 11

```
DB_CONNECTION=sqlite

```

## Step 05

Run this commands for install the application:

```
sudo docker-compose build app
sudo docker-compose up -d
sudo docker-compose ps
sudo docker-compose exec app composer install
docker-compose exec app php artisan migrate
```

## Step 06

Stopping the services

```
sudo docker-compose down
```

## Endpoints

Where `BASE_URL` is `http://localhost:8383` for example

 - **GET** *{BASE_URL}*/api/carro
 - **GET** *{BASE_URL}*/api/carro/1
 - **POST** *{BASE_URL}*/api/carro
 - **PUT** *{BASE_URL}*/api/carro/1
 - **DELETE** *{BASE_URL}*/api/carro/1
