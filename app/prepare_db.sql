CREATE DATABASE laravel; 

CREATE USER 'laravel'@'localhost' IDENTIFIED BY 'secret';

GRANT ALL PRIVILEGES ON  laravel.* TO 'laravel'@'localhost';