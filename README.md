College matriculant personal page / Личный кабинет студента колледжа

Install:
1. git clone https://github.com/Netsify/matriculation.git projectname
2. cd projectname
3. composer install
4. composer update
5. copy .env.example to .env
6. php artisan key:generate
7. for MySQL

    set DB_CONNECTION
    
    set DB_DATABASE
    
    set DB_USERNAME
    
    set DB_PASSWORD
8. php artisan migrate --seed
9. edit .env for emails configuration


