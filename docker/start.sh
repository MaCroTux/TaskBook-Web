docker build .                                     \
    -t taskbook                                 && \
docker run                                         \
    -d                                             \
    -p 8080:80                                     \
    -v "$PWD":/var/www/html                        \
    -v "$PWD"/docker/taskbook/.taskbook.json:/var/www/.taskbook.json    \
    -v "$PWD"/docker/taskbook/userData:/var/www/userData    \
    taskbook
