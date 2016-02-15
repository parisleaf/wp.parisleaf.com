FROM tutum/apache-php

# copy over WP install
COPY . /var/www/html/

# curl for php tools
RUN apt-get update
RUN apt-get install -y curl git-core

WORKDIR /var/www/html

# composer
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install

# wp-cli
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
RUN chmod +x wp-cli.phar
RUN mv wp-cli.phar /usr/local/bin/wp
