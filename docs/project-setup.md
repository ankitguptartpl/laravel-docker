# Project Setup

## Index
1. [Docker Installation and Setup for Group Buy](docs/install-and-setup-docket.md)
2. [Setup Project](#setup-project)


## Setup Project
* Create a git branch name `service/feature/tast-1` from [Group Buy Git Repository](https://git.ranosys.org/arif.khan/laravel-microservice.git)
* Go to project root directory
* Make Yourself owner of server folder from `server` folder
```
sudo chown -R {your-desktop-user-name} htdocs/
```
* Checkout from branch name
* `service/feature/tast-1`
* Go to `/server/htdocs/{your-service-name}`
* Give 777 permission to `/storage` and `/bootstrap` directory
```
chmod -R 0777 storage/
chmod -R 0777 bootstrap/
```
* Copy `.env.example` file to `.env` by running following command from project root folder.
```
cp .env.example .env
```
* Install dependencies from server container.
    * Go to we container bash
    ```
    docker exec -it {group_buy_server_1} bash
    ```
    * Go to service folder
    ```
    cd admin
    ```
    * Install dependencies
    ```
    composer update
    ```
	* Autoload composer file via
	```
	composer dump-autoload
	```
    * Create Database tables
    ```
    php artisan migrate
    ```
    * Insert Data into tables from Seeders ( Uncomment seeders from `DatabaseSeeder.php` and run )
    ```
    php artisan db:seed
    ```