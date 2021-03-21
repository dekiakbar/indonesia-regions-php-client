FROM ubuntu:20.04
RUN apt-get update && \
    apt-get install software-properties-common -y && \
    add-apt-repository ppa:ondrej/php && \
    apt update && \
    apt install tar mysql-client wget git php7.2 php7.3 php7.4 \
        php7.2-curl \
        php7.3-curl \
        php7.4-curl \
        php7.2-mbstring \
        php7.3-mbstring \
        php7.4-mbstring \
        php7.2-dom \
        php7.3-dom \
        php7.4-dom \
        php7.2-mysql \
        php7.3-mysql \
        php7.4-mysql \
        composer -y
VOLUME ["/app"]
WORKDIR /app
CMD ["/bin/bash"]