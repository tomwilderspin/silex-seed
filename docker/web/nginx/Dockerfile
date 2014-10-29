FROM centos:centos6

MAINTAINER Tom Wilderspin, tomwilderspin@gmail.com

RUN yum update -y >/dev/null && \
yum install -y http://ftp.riken.jp/Linux/fedora/epel/6/i386/epel-release-6-8.noarch.rpm  && \
curl -L -o /etc/yum.repos.d/hop5.repo "http://www.hop5.in/yum/el6/hop5.repo"

RUN yum install -y python-meld3 http://dl.fedoraproject.org/pub/epel/6/i386/supervisor-2.1-8.el6.noarch.rpm

RUN ["yum", "-y", "install", "nginx"]

ADD nginx.conf /etc/nginx/

ADD hhvm.conf /etc/nginx/conf.d/

EXPOSE 80

CMD nginx