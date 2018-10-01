FROM nimmis/apache-php7

RUN apt-get update && \
apt-get install -y npm

RUN npm install n -g && \
n stable

RUN npm install -g taskbook

RUN chown root:www-data /var/www -R && chmod g+w /var/www -R
