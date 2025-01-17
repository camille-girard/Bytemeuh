FROM wordpress:latest

COPY ssl.sh /usr/local/bin/
COPY --chmod=777 wp_data/ /var/www/html/

RUN ["chmod", "+x", "/usr/local/bin/ssl.sh"]
