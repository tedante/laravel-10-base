# Laravel 10 Fresh Install with Docker Compose File

This is a fresh install of [Laravel](https://laravel.com/) 10 with a docker-compose file. This is a simple way to get a Laravel 10 project up and running with Docker.

# Installation with Docker

To get started, you will need to have [Docker](https://www.docker.com/) installed on your machine. Once you have Docker installed, you can follow the steps below.

## Via Bash Script

* Run this on your terminal 
```bash
curl -s https://raw.githubusercontent.com/tedante/laravel-10-base/main/install-with-docker.sh | bash
```

* Jump to step 4, to install the dependencies and run migration.

## Via clone repository

1. clone the repository, then navigate to the project directory:
```bash
git clone git@github.com:tedante/laravel-10-base.git
cd laravel-10-base
```

2. copy the `.env.example` file to `.env` and update the environment variables as needed:
```bash
cp .env.example .env
```
  
3. run the following command to create the containers and start the project:
```bash
docker-compose up -d
```

4. run the following command to install the dependencies:
```bash
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
```

5. You can access it at [http://localhost:8000](http://localhost:8000).


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
