FROM centos:centos6

MAINTAINER Tom Wilderspin, tomwilderspin@gmail.com

RUN yum update -y >/dev/null && \
yum install -y http://ftp.riken.jp/Linux/fedora/epel/6/i386/epel-release-6-8.noarch.rpm  && \
curl -L -o /etc/yum.repos.d/hop5.repo "http://www.hop5.in/yum/el6/hop5.repo"

RUN yum install -y python-meld3 http://dl.fedoraproject.org/pub/epel/6/i386/supervisor-2.1-8.el6.noarch.rpm

RUN ["yum", "-y", "install", "curl", "curl-devel", "php", "php-common", "php-curl", "php-mysql", "php-devel", "php-gd", "php-pspell", "php-snmp", "php-xml","hhvm"]

ADD config.hdf /etc/hhvm/config.conf

EXPOSE 8000

CMD hhvm -m server -p 8000 -vServer.Type=fastcgi
