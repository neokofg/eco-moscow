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

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions pdo_pgsql intl sockets bcmath pcntl zip swoole

RUN install-php-extensions @composer

RUN apk update && \
    apk add freetype-dev \
    		libjpeg-turbo-dev \
            php-zip \
    		libpng-dev && \
    docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
    docker-php-ext-install gd

ENV DB_HOST db
ENV REDIS_HOST redis

CMD ["php", "artisan", "octane:start", "--host=0.0.0.0"]
