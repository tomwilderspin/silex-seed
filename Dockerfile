FROM centos:centos6

MAINTAINER Tom Wilderspin, tomwilderspin@gmail.com

RUN yum update -y >/dev/null && \
yum install -y http://ftp.riken.jp/Linux/fedora/epel/6/i386/epel-release-6-8.noarch.rpm  && \
curl -L -o /etc/yum.repos.d/hop5.repo "http://www.hop5.in/yum/el6/hop5.repo"

RUN yum install -y python-meld3 http://dl.fedoraproject.org/pub/epel/6/i386/supervisor-2.1-8.el6.noarch.rpm

RUN ["yum", "-y", "install", "nginx", "curl", "curl-devel", "wget", "php", "php-common", "php-curl", "php-mysql", "php-devel", "php-gd", "php-pecl-memcache", "php-pspell", "php-snmp", "php-xmlrpc", "php-xml","hhvm"]

RUN mkdir -p /var/www/{web,src,config} && chmod a+r /var/www

RUN wget -O /var/www/composer -q http://getcomposer.org/composer.phar

ADD composer.json /var/www/composer.json

ADD composer.lock /var/www/composer.lock

RUN hhvm /var/www/composer install --no-ansi --no-dev --no-interaction --no-progress --no-scripts --optimize-autoloader

ADD /web/ /var/www/web/

ADD /src/ /var/www/src/

ADD /config/ /var/www/config/

ADD /docker/web/config.hdf /etc/hhvm/config.hdf

RUN service hhvm restart

ADD /docker/web/nginx.conf /etc/nginx/conf.d/default.conf

ADD /docker/web/supervisord.conf /etc/supervisord.conf

RUN chkconfig supervisord on && chkconfig nginx on

ADD /docker/web/run.sh /run.sh

RUN chmod a+x /run.sh

EXPOSE 22 80

ENTRYPOINT ["/run.sh"]
