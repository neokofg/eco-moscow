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
RUN install-php-extensions @composer

RUN touch /usr/local/etc/php/php.ini

RUN apk add npm

WORKDIR /var/www/eco/eco-admin-service

COPY . .

RUN npm install

RUN npm run build

ENV DB_HOST db
ENV EVENTS_DB_HOST events-db
ENV REDIS_HOST redis

CMD ["php", "artisan", "octane:start", "--host=0.0.0.0"]
