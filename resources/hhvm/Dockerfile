FROM centos:centos6

MAINTAINER Tom Wilderspin, tomwilderspin@gmail.com

RUN yum update -y >/dev/null && \
yum install -y http://ftp.riken.jp/Linux/fedora/epel/6/i386/epel-release-6-8.noarch.rpm  && \
curl -L -o /etc/yum.repos.d/hop5.repo "http://www.hop5.in/yum/el6/hop5.repo"

RUN yum install -y python-meld3 http://dl.fedoraproject.org/pub/epel/6/i386/supervisor-2.1-8.el6.noarch.rpm

RUN yum -y install php php-fpm php-gd \
    php-pear php-mysql hhvm \
    php-mcrypt php-xcache php-xml php-xmlrpc \
    php-xdebug php-curl php-devel msmtp

RUN sed -i 's/memory_limit = .*/memory_limit = '256M'/' /etc/hhvm/php.ini && \
    sed -i 's/html_errors = .*/html_errors = 'On'/' /etc/hhvm/php.ini

RUN echo "date.timezone= Europe/London" >> /etc/hhvm/php.ini && \
    echo "[xdebug]" >> /etc/hhvm/php.ini && \
    echo "zend_extension='/usr/lib64/php/modules/xdebug.so'" >> /etc/hhvm/php.ini && \
    echo "xdebug.remote_enable = 1" >> /etc/hhvm/php.ini && \
    echo "xdebug.collect_params = 3" >> /etc/hhvm/php.ini

RUN mkdir -p /srv/http

ADD config.hdf /etc/hhvm/config.conf

VOLUME /var/log/hhvm/

EXPOSE 8000

CMD hhvm -m server -p 8000 -vServer.Type=fastcgi