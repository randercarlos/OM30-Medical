FROM php:7.4

LABEL maintainer="Rander Carlos"

RUN apt-get update
RUN apt-get upgrade -y

RUN apt-get install --fix-missing -y libpq-dev
RUN apt-get install --no-install-recommends -y libpq-dev
RUN apt-get install -y libxml2-dev libbz2-dev zlib1g-dev
RUN apt-get -y install libsqlite3-dev libsqlite3-0 mariadb-client curl exif ftp
RUN docker-php-ext-install intl
RUN docker-php-ext-install mysqli pgsql pdo pdo_mysql pdo_pgsql
RUN docker-php-ext-enable mysqli
RUN docker-php-ext-enable pgsql
RUN docker-php-ext-enable pdo
RUN docker-php-ext-enable pdo_mysql
RUN docker-php-ext-enable pdo_pgsql
RUN apt-get -y install --fix-missing zip unzip
RUN apt-get -y install --fix-missing git

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY  . /usr/src/myapp
WORKDIR /usr/src/myapp
RUN chmod -R 0777 /usr/src/myapp/writable

RUN apt-get clean \
    && rm -r /var/lib/apt/lists/*

RUN composer install
#CMD php spark serve --host=0.0.0.0 --port=8000
CMD php -S 0.0.0.0:8000 -t public/
EXPOSE 8000
