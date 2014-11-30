FROM nginx:1.7

MAINTAINER Tom Wilderspin [tom@flashtalking.com]

RUN mkdir -p /srv/http

COPY server/ /etc/nginx/conf.d/

ADD nginx.conf /etc/nginx/

VOLUME /srv/http