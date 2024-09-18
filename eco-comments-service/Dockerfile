FROM php:8.3-alpine
RUN apk update && apk add \
    bash \
    git \
    nano \
    htop \
    fish \
    libpq-dev \
    postgresql-client \
    zip \
    wget

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions
RUN install-php-extensions pdo_pgsql intl sockets bcmath zip
RUN install-php-extensions pcntl
RUN install-php-extensions grpc
RUN install-php-extensions mongodb
RUN install-php-extensions @composer

RUN touch /usr/local/etc/php/php.ini

ENV DB_HOST posts-db
ENV MAIN_DB_HOST db
ENV REDIS_HOST redis
ENV MONGODB_URL mongodb://root:root@mongodb:27017/
ENV ACHIEVEMENT_SERVER_HOST achievement-service:9090

CMD ["php", "artisan", "octane:start", "--host=0.0.0.0"]
