FROM webdevops/php-nginx:8.0-alpine

USER 1000

## Cleanout previous dev just in case
# RUN rm -rf /app/*

ADD . /app

WORKDIR /app

RUN composer install --no-ansi --no-scripts --prefer-dist --no-progress --no-interaction \
      --optimize-autoloader

WORKDIR /app/public

# USER root

RUN find /usr/share/GeoIP -not -user www-data -execdir chown "www-data:" {} \+ && \
    find /app -not -user www-data -execdir chown "www-data:" {} \+

#HEALTHCHECK \
#  --interval=30s \
#  --timeout=60s \
#  --retries=10 \
#  --start-period=60s \
#  CMD if [[ "$(curl -f http://127.0.0.1/ | jq -e . >/dev/null 2>&1)" != "0" ]]; then exit 1; else exit 0; fi
