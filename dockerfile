FROM nimmis/apache-php7

RUN apt-get update      &&  \
apt-get install -y          \
    npm                     \
    php7.0-soap             \
    php7.0-xml              \
    php7.0-zip              \
    php7.0-json             \
    php7.0-mbstring     &&  \
    npm install n -g    &&  \
    n stable

RUN npm install -g taskbook

RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer --install-dir=/usr/local/bin

RUN chown root:www-data /var/www -R             && \
    chmod g+w /var/www -R                       && \
    mkdir /var/www/userData                     && \
    chown www-data:www-data /var/www/userData
