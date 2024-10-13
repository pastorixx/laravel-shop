# Laravel simple shop

## Local deploy with docker

-   Edit .env

```bash
DB_HOST=mysql
```

-   Run/stop docker

```bash
docker-compose build --no-cache
docker-compose up -d
docker-compose stop
```

-   After run docker container

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```
