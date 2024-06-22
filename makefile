bash:
	docker-compose exec -u user php bash

start:
	docker-compose up -d

restart:
	docker-compose down && docker-compose up -d

stop:
	docker-compose stop

down:
	docker-compose down

mysql:
	docker-compose exec mysql mysql --user=chiquim --password=123456
