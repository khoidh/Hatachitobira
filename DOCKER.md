# Setting Up with Docker Composer

## Setup Environment files
`cp .env.docker.example .env`

## Install the project
```
docker-compose run --rm --no-deps app-server composer install
docker-compose run --rm --no-deps app-server php artisan key:generate
docker-compose run --rm --no-deps app-server php artisan storage:link
docker-compose up -d
```

## Migrate & Seed data
`docker-compose run --rm app-server php artisan migrate --seed`

## Access site through browser
`http://localhost:8000`

### Admin User created
`http://localhost:8000/admin/login`

Admin login info 
```
Email: tinhvan@gmail.com
password: tinhvan@2018
```
