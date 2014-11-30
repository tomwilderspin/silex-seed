FROM centos:centos6

MAINTAINER Tom Wilderspin [tom@flashtalking.com]

RUN rpm -i http://dl.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm

RUN yum -y install php php-fpm php-gd php-ldap \
    php-sqlite php-pear php-mysql \
    php-mcrypt php-xcache php-xml php-xmlrpc \
    php-xdebug php-curl php-devel msmtp

RUN yum -y install gcc gcc-c++ autoconf automake

RUN pecl install Xdebug

RUN mkdir -p /srv/http && \
    chown -R apache:apache /srv/http

RUN sed -i 's/memory_limit = .*/memory_limit = '256M'/' /etc/php.ini && \
    sed -i 's/html_errors = .*/html_errors = 'On'/' /etc/php.ini

RUN echo "date.timezone= Europe/London" >> /etc/php.ini && \
    echo "[xdebug]" >> /etc/php.ini && \
    echo "zend_extension='/usr/lib64/php/modules/xdebug.so'" >> /etc/php.ini && \
    echo "xdebug.remote_enable = 1" >> /etc/php.ini && \
    echo "xdebug.collect_params = 3" >> /etc/php.ini




ADD php-fpm.conf /etc/

ADD www.conf /etc/php-fpm.d/

EXPOSE 8000

ENTRYPOINT ["php-fpm","-F"]