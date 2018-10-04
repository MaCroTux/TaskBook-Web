docker build . -t taskbook && docker run -d -p 8080:80 -v "$PWD":/var/www/html taskbook
