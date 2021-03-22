FROM ubuntu:20.04
RUN apt-get update && \
    apt-get install software-properties-common -y && \
    add-apt-repository ppa:ondrej/php && \
    apt update && \
    apt install tar mysql-client wget git php7.2 php7.3 php7.4 php8.0 \
        php7.2-curl \
        php7.3-curl \
        php7.4-curl \
        php8.0-curl \
        php7.2-mbstring \
        php7.3-mbstring \
        php7.4-mbstring \
        php8.0-mbstring \
        php7.2-dom \
        php7.3-dom \
        php7.4-dom \
        php8.0-dom \
        php7.2-mysql \
        php7.3-mysql \
        php7.4-mysql \
        php8.0-mysql \
        -y
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer && \
    cp /usr/local/bin/composer /usr/bin/composer
VOLUME ["/app"]
WORKDIR /app
CMD ["/bin/bash"]