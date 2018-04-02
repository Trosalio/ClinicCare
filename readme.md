# Laravel Project

> Laravel 5.6

## Quick Start

``` bash
# Install Dependencies
composer install

# Install Node Package Manager
npm install

# Create database file and name it 
laraveldb

# Import database file --- NOT YET
laravel-project.sql

# Set configs in .env as followed:
DB_DATABASE=laraveldb
DB_USERNAME=root
DB_PASSWORD=

# Run Migrations --- NOT YET
php artisan migrate

# Import database data --- NOT YET
php artisan db:seed

# If you get an error about an encryption key
php artisan key:generate

# Add virtual host if using Apache --- OPTIONAL
```

### Adding Virtual Host For Windows User Using XAMPP:

- In ```C:\xampp\apache\conf\extra\``` open ```httpd-vhosts.conf``` , insert

```
<VirtualHost *:80>
    ServerName <prefered-name>.test
    DocumentRoot "C:/xampp/htdocs/laravel-project/public"
</VirtualHost>

```
and then save.

- In ```C:\Windows\System32\drivers\etc``` open ```host ``` as ```Administrator```, insert

```
127.0.0.1 <prefered-name>.test
```

and then save.

Now, you should be able to open any prefered-browser, type ```<prefered-name>.test```, and it should display laravel's project


## App Info

### Authors
* Thanpong Supalak - 5810405029
<a href="mailto:thanapong.su@ku.th?Subject=Regarding%20Laravel%20Project" target="_blank">Contact</a>
*
*
*



### Version
Beta

### License
This project is licensed under the MIT License
