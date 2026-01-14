## Installation

git clone https://github.com/PPaillard/biblios
composer install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load

## Lancer les tests

php bin/console doctrine:database:create --env=test --if-not-exists
php bin/console doctrine:schema:create --env=test
php bin/console doctrine:fixtures:load --env=test --no-interaction
php bin/phpunit