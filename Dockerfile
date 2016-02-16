FROM ubuntu:14.04

# install curl and git
RUN apt-get update
RUN apt-get install -y curl git-core

# install composer
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install

# install wp-cli
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
RUN chmod +x wp-cli.phar
RUN mv wp-cli.phar /usr/local/bin/wp
