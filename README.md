# Custom rest framework

Core, Sign in and sign up actions, json middleware, user entity, request data validators, user entity and repository,
migrations and database config.


## How to test

Run the development server:

```bash
docker-composer up --build
```

When everything is running, run migrations by the following command:

```bash
docker-compose exec php-fpm php bin/migrate.php
```

Test:

```bash
curl http://127.0.0.1:8000/
```
