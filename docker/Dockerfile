FROM alpine:latest
ENV PHP_VER=82
RUN \
    echo "Installing basic utils ..." && \
    apk add bash
RUN \
    echo "Installing PHP + PHP-FPM ..." && \
    apk add php$PHP_VER && \
    apk add php$PHP_VER-fpm && \
    ln -s /usr/bin/php$PHP_VER /usr/bin/php
RUN \
    echo "Installing nginx ..." && \
    apk add nginx && \
    mv /etc/nginx/http.d/default.conf /etc/nginx/http.d/default.conf.old && \
    mkdir /var/www/html && \
    chown -R nginx /var/www
RUN \
    echo "Setting up Sqlite ..." && \
    apk add sqlite && \
    apk add php82-pdo && \
    apk add php82-pdo_sqlite
COPY default.conf /etc/nginx/http.d/default.conf
COPY index.php /var/www/html/index.php
COPY startup.sh /usr/sbin/startup.sh
RUN chmod +x /usr/sbin/*.sh
ENTRYPOINT /usr/sbin/startup.sh
