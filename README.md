# notsc

## Setup

* Clone repository
* Create database 'notsc' with user 'root' and no password

    mysql -u root
    mysql create database notsc

* Install Composer
* Adjust migrations and seeders depending on what sample data you want
* Run Laravel migrations & seeds

    php artisan migrate:refresh --seed
* Set up dev.notsc.com within your environment and set the web root to the 'public' directory within this repo
