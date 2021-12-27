docker-compose exec app  /bin/bash
docker-compose exec nginx  /bin/sh
docker-compose exec mysql  /bin/bash

php artisan config:cache
php artisan config:clear

php artisan migrate

docker-compose build
docker-compose up -d
docker-compose ps -a

docker-compose up -d --build

docker-compose down