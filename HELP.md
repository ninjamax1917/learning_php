docker compose run --rm composer init

docker compose run --rm composer install

docker compose run --rm composer update

sudo chown $USER:$USER composer.json

docker compose run --rm composer require --dev laravel/pint
docker compose run --rm composer require --dev symfony/var-dumper

sudo chown -R $USER:$USER .