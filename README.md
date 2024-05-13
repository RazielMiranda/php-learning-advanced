# PHP Tutorial in 6 Steps

Follow these instructions to create a Docker container that includes:
* PHP 8.2
* nginx web server
* SQLite3 database

## Install Docker
Head over to the Docker website for installation instructions:
* https://www.docker.com/get-started/

## Build the container
Before you can use
1. Open a command prompt / terminal window
2. Clone this repository:
```
git clone https://github.com/dbierer/php-6-steps-tutorial.git
```
  * If you don't have `git` installed, you can also do this:
  * Download the ZIP file of this repository from here: https://github.com/dbierer/php-6-steps-tutorial/archive/refs/heads/main.zip
  * Unzip into an appropriate folder on your computer
3. Change to the directory (folder) that contains the cloned Github repository files
4. Build the Docker container:
```
docker build -t php-6-steps .
```

## Run the container
Use this command to run the container:
```
docker run -d -p 8888:80 -v `pwd`:/home/tutorial php-6-steps
```
You'll now need to run this command to get the name assigned to the container:
```
docker container ls
```
For this tutorial, we'll refer to the container name as `$NAME`

## Shell into the container
To open a command shell into the container run this command:
```
docker exec -it $NAME /bin/bash
```

## Access the container from your browser
To access the output from the nginx web server type this URL into your browser: `http://localhost:8888/`

## Create a PHP program
You can now create a PHP program that's visible from your browser.
* Make sure that you are *not* shelled into the container!
* You need to do this from your editor *outside* the Docker container

Create a "hello_world" program:
1. Open your code editor
2. Enter this PHP code:
```
<?php
echo 'Hello World!';
```
3. Save the file as `hello_world.php` in the directory that contains the files from the repository
4. Test from your browser using this URL: `http://localhost:8888/tutorial/hello_world.php`

## Stop the container
If you are running on Windows or Mac, you can use the Docker Desktop to start or stop the container.

Otherwise, from the command line, run this command, where `$NAME` is the name of the container
```
docker container stop $NAME
```


