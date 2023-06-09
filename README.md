# email_manager

Requirements: You need to have docker installed (If you do not use docker, you must have at least PHP 8.0.2 and composer installed)

Download the project to a directory and open it in the terminal

Execute the command - 

<pre> docker compose up -d </pre>

Enter the docker container using the command - 

<pre>$ docker exec -it emailManager_app /bin/bash</pre>

Execute the commands in turn -

<pre>
<span>$ composer update</span>
<span>$ chmod -R 775 storage</span>
<span>$ chmod -R ugo+rw storage</span>
</pre>

Rename the file .env.example to .env

In the .env file, connect to the database and smtp server -

(copy)
<pre>
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=emailManeger_db
DB_USERNAME=root
DB_PASSWORD=root
</pre>
(add your data)
<pre>
EMAIL_HOST=ssl://smtp.gmail.com
EMAIL_USERNAME=user@gmail.com
EMAIL_PASSWORD=password
</pre>

Execute the command - php artisan migrate

Follow the link - http://localhost:8000/
