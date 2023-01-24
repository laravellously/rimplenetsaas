FROM webdevops/php-nginx:8.0-alpine

USER 1000

# Copy code to /var/www
COPY --chown=$USER:www-data . /app

RUN composer install --optimize-autoloader --no-dev

WORKDIR /app/public
