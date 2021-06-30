## Tinnova Challenge PHP  (tinnova-challenge-php)

This is the RESTfull API to accompish the Tinnova Challenge. The SPA that consumes this API is Tinnova Challenge SPA (https://github.com/ephiot/tinnova-challenge-spa).

## Run the docker container from the project dir

```bash
docker-compose up -d
```

## Setting database

The database is already set on docker-compose, but if the migration/seeder not run on 'docker-compose up', just execute the command bellow:

```bash
docker-compose exec laravel.test php artisan migrate --seed
```

## About the tasks

In order to execute the tasks, run the container and execute the commands bellow:

```bash
# Task 1: Election Votes
docker-compose exec laravel.test php artisan exercise:election

# Task 2: BubbleSort
docker-compose exec laravel.test php artisan exercise:bubble-sort

# Task 3: Factorial
docker-compose exec laravel.test php artisan exercise:factorial

# Task 4: Multiples
docker-compose exec laravel.test php artisan exercise:multiples
```

Note: You can use ---help to see more execution options of each task.

## Tests

To run the tests execute the command bellow:

```bash
docker-compose exec laravel.test ./vendor/bin/phpunit --testdox
```
