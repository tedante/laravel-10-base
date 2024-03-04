# Laravel 10 Fresh Install with Docker Compose File

This is a fresh install of [Laravel](https://laravel.com/) 10 with a docker-compose file. This is a simple way to get a Laravel 10 project up and running with Docker.

# Getting Started

To get started, you will need to have [Docker](https://www.docker.com/) installed on your machine. Once you have Docker installed, you can clone this repository and run the following command to build the project:

```bash
docker-compose up -d
```

And then run the following command to install the dependencies:

```bash
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
```

This will start the project and you can access it at [http://localhost:8080](http://localhost:8080).


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
