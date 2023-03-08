build:
	composer i
	cp .env.example .env
	php artisan key:generate
	npm run build

start:
	docker-compose --env-file=.env up -d
	make migrate

stop:
	docker-compose down

restart:
	docker-compose --env-file=.env up -d --force-recreate

status:
	docker-compose ps

migrate:
	docker exec -it short_links_app php artisan migrate

test:
	@if [ ! -d "./public/build" ]; then\
			npm run build;\
	fi
	docker exec -it short_links_app php artisan test --parallel --env=testing