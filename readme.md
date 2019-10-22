
## {1:Project Name}
TODO: Movies Review Harukaedu
## Installation
TODO: Describe the installation process
1. git clone (this repository)
2. open command promt and composer install
3. copy and rename .env.example to .env
4. setting your env
  * DB_CONNECTION=mysql
  * DB_HOST=127.0.0.1
  * DB_PORT=3306
  * DB_DATABASE=movie_review
  * DB_USERNAME=root
  * DB_PASSWORD=
5. migrate your databases table using 'php artisan migrate' on terminal
7. use php seeder for data record
  +  php artisan db:seed --class=MoviesTableSeeder
  * php artisan db:seed --class=UsersTableSeeder

6. page Home http://127.0.0.1:8000/
7. page login http://127.0.0.1:8000/login

# for login after using php seeder Users : 
 * username : "check username on table users"
 * pasword : password 

## Server database and framework
1. mysql!
2. Framework Laravel 5.8*

## History
TODO: Write history
## Credits
TODO: Write credits
## License
TODO: Write license
