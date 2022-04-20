include .env
export

up: docker-up
upi: docker-up-interactive
down: docker-down
restart: down up
build: docker-build
rebuild: down build up
init: docker-down-clear	docker-pull	docker-build docker-up

connect:
	docker-compose exec php-fpm bash
docker-up:
	docker-compose up -d
docker-up-interactive:
	docker-compose up
docker-down:
	docker-compose down --remove-orphans
docker-down-clear:
	docker-compose down -v --remove-orphans
docker-pull:
	docker-compose pull
docker-build:
	docker-compose build

db-create:
	docker-compose exec mariadb sh -c "mysql -uroot -p${DB_ROOT_PASSWORD} -e \"drop database if exists \\\`${DB_DATABASE}\\\`; create database \\\`${DB_DATABASE}\\\`;\""
	docker-compose exec mariadb sh -c "mysql -uroot -p${DB_ROOT_PASSWORD} -e \"GRANT ALL PRIVILEGES ON *.* TO '${DB_USERNAME}'@'%' IDENTIFIED BY '' WITH GRANT OPTION;\""
	docker-compose exec mariadb sh -c "mysql -uroot -p${DB_ROOT_PASSWORD} -e \"FLUSH PRIVILEGES;\""

db-wipe: db-create
	docker-compose exec php-fpm sh -c "php artisan db:wipe --drop-views && php artisan db:wipe --drop-views && php artisan migrate:fresh --seed && composer dump-autoload && php artisan db:seed --class=CashbackSeeder"
	#docker-compose exec -T mariadb sh -c "mysql -f -uroot -p${DB_ROOT_PASSWORD} -D ${DB_DATABASE}" < docker/development/mariadb/dump/stage_goods_23-10-2021_16:08:00.sql

composer-install:
	docker-compose exec php-fpm sh -c "XDEBUG_MODE=off composer install"


