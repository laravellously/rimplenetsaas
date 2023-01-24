FROM webdevops/php-nginx:8.0-alpine

USER 1000

# Copy code to /var/www
COPY --chown=www-data:www-data . /app

RUN cd /app && composer install --optimize-autoloader --no-dev

WORKDIR /app/public
