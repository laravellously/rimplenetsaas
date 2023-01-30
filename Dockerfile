FROM webdevops/php-nginx:8.1-alpine

USER 1000

ENV WEB_DOCUMENT_ROOT=/app/public

WORKDIR /app

COPY composer.json ./

COPY composer.lock ./

RUN composer install --no-dev --ignore-platform-reqs --no-autoloader --no-scripts

# Custom cache invalidation
ARG CACHEBUST=1

# Copy code to /var/www
COPY --chown=application:application . ./

RUN cd storage/framework && mkdir sessions && mkdir cache

RUN chmod -R 775 storage/*

RUN composer dump-autoload --optimize
