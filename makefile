migrate:
	@docker compose exec -u1000:1000 app php artisan migrate

db-ref:
	@docker compose exec -u1000:1000 app php artisan migrate:refresh

recache:
	@docker compose exec -u1000:1000 app php artisan route:clear
	@docker compose exec app php artisan cache:clear
	@docker compose exec -u1000:1000 app php artisan config:clear

dc-up:
	@docker compose up -d

dc-dn:
	@docker compose down

mk-mdl:
	@docker compose exec -u1000:1000 app php artisan make:model $(mdl) -mc

mk-req:
	@docker compose exec -u1000:1000 app php artisan make:request $(req)

mk-pol:
	@docker compose exec -u1000:1000 app php artisan make:policy $(pol) --model=$(mdl)

push:
	@git push origin main