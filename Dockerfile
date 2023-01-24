FROM webdevops/php-nginx:8.0-alpine

USER 1000

ENV WEB_DOCUMENT_ROOT=/app/public

# Copy code to /var/www
COPY --chown=application:application . /app

WORKDIR /app

RUN composer install --optimize-autoloader --no-dev

RUN cd storage/framework && mkdir sessions && mkdir cache

RUN chmod -R 775 storage/*
