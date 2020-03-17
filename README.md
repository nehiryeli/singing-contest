# Singing Contest Simulator
## Developed on 
PHP 7.4 and MySQL 5.7

## How To Deploy
### Method 1: Docker Compose
Update credentials in .env file if you need.
<br>
Create database structure
``` 
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```
Load music genre inforation to db 
```
php bin/console doctrine:fixtures:load
```

## Method 2: Self Deployment
Use files ```www``` folder. Update DB credentials located in 
```www\.env``` file. Run following commands from ```www``` folder

Import DB schema in ```SQL``` folder
## How To Run
Run http://localhost:8080/public/index.php/ with Docker configuration
Or 
```SERVER ROOT/public/index.php/```

## How To Test
RUN ```php bin/phpunit``` from www folder.

