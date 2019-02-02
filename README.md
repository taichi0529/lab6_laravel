# lab6_laravel

## Usage

```
git clone git@github.com:taichi0529/lab6_laravel.git
cd lab6_laravel/docker
docker-compose up -d
docker-compose exec php-apache composer install
cd ../src
cp .env.example .env
cd ../docker
docker-compose exec php-apache php artisan key:generate
```
