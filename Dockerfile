FROM webdevops/php-nginx:8.1

USER 1000

ENV WEB_DOCUMENT_ROOT=/app/public

# Copy code to /var/www
COPY --chown=application:application . /app

WORKDIR /app

RUN cd storage/framework && mkdir sessions && mkdir cache

RUN chmod -R 775 storage/*

RUN composer install --optimize-autoloader --no-dev --ignore-platform-reqs --no-scripts
