CREATE DATABASE laravel2; 

CREATE USER 'laravel2'@'localhost' IDENTIFIED BY 'secret';

GRANT ALL PRIVILEGES ON  laravel2.* TO 'laravel2'@'localhost';