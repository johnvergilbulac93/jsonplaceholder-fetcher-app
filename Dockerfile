FROM webdevops/php-nginx:8.3-alpine

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

#RUN install-php-extensions pdo_sqlsrv sqlsrv

COPY ./nginx/vhost.conf /opt/docker/etc/nginx/vhost.conf

# RUN which crond && \
#     rm -rf /etc/periodic

RUN apk add --no-cache tzdata
    ENV TZ Asia/Manila

# ADD crontab.txt /crontab.txt

# Copy Composer binary from the Composer official Docker image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV WEB_DOCUMENT_ROOT /app/public
ENV APP_ENV production
WORKDIR /app
COPY . .
RUN git config --global --add safe.directory /app

RUN composer install --no-interaction --optimize-autoloader
# Optimizing Configuration loading
RUN php artisan config:clear
# Optimizing Route loading
RUN php artisan route:clear
# Optimizing View loading
RUN php artisan view:clear

#RUN php artisan cache:clear

RUN php artisan optimize

RUN chown -R application:application .
RUN composer install --no-interaction --optimize-autoloader

# RUN php artisan app:test-email
# RUN /usr/bin/crontab /crontab.txt

EXPOSE 80
