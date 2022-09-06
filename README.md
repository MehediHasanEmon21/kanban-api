## Getting Started

It's super easy to get Kanban api up and running.

First clone the project and change the directory

```shell
git clone https://github.com/MehediHasanEmon21/kanban-api.git
cd kanban-api
```

Then follow the process.

### For Running the Kanban api Project

1. install the dependencies

```shell
composer install
```

2. Copy `.env.example` to `.env`

```shell
cp .env.example .env
```

3. Generate application key

```shell
php artisan key:generate
```

4. Run Migrations

```shell
php artisan migrate
```

5. Start the webserver

```shell
php artisan serve
```

That's mostly it! You have a fully running kanban api project.