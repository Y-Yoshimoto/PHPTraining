FROM nginx/unit:1.9.0-php7.0
MAINTAINER y.yoshimoto

# コンテツファイルの設置
COPY php.ini /etc/
RUN mkdir -p /var/www/php/
COPY contents/* /var/www/php/

COPY unit.conf.json /www/
COPY docker-entrypoint.sh /www/

# 参考 http://unit.nginx.org/
ENTRYPOINT ["/bin/bash"]
CMD ["/www/docker-entrypoint.sh"]


#
#"options": {
#    "file": "/etc/php.ini"
# }
