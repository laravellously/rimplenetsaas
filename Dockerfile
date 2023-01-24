FROM webdevops/php-nginx:8.0-alpine

WORKDIR /app

USER 1000

# Add user for laravel application
# RUN groupadd -g 1000 www
# RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy code to /var/www
COPY . /app

# add root to www group
RUN chmod -R ug+w /app/storage

RUN composer install --optimize-autoloader --no-dev
