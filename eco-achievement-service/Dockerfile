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
    install-php-extensions pdo_pgsql amqp grpc

RUN install-php-extensions @composer

COPY --from=ghcr.io/roadrunner-server/roadrunner:2023.1.1 /usr/bin/rr /usr/bin/rr

ENV RABBITMQ_HOST = rabbitmq

CMD ["rr", "serve", "-c", ".rr.yaml"]
