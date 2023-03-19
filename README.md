# email_manager

Requirements: You need to have docker installed (If you do not use docker, you must have at least PHP 8.0.2 and composer installed)

Download the project to a directory and open it in the terminal

Execute the command - docker compose up -d

Enter the docker container using the command - docker exec -it emailManager_app /bin/bash

Execute the commands in turn -

<h3><code>composer update</code><h3>

4.2 chmod -R 775 storage

4.3 chmod -R ugo+rw storage

Rename the file .env.example to .env

In the .env file, connect to the database and smtp server -

(copy)

DB_CONNECTION=mysql

DB_HOST=db

DB_PORT=3306

DB_DATABASE=emailManeger_db

DB_USERNAME=root

DB_PASSWORD=root

(add your data)

EMAIL_HOST=ssl://smtp.gmail.com

EMAIL_USERNAME=user@gmail.com

EMAIL_PASSWORD=password

Execute the command - php artisan migrate

Follow the link - http://localhost:8000/
