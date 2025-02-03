PASSWORD ?= $(shell bash -c 'read -s -p "Database Password: " pwd; echo $$pwd')
CACHE_KEY ?= $(shell bash -c 'read -p "Cache Key: " key; echo $$key')


.PHONY: dump-sql
dump-sql:
	docker cp ./sql/data.sql docker-php-nginx-redis-db-1:/var && \
	docker compose exec db sh -c "/usr/bin/mariadb -u dockeruser --password=$(PASSWORD) nginxphpredis < /var/data.sql"
