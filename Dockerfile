# Utilisation de l'image PHP avec Apache
FROM php:8.0-apache

# Activation des modules PHP nécessaires
RUN docker-php-ext-install mysqli session

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

COPY php.ini /usr/local/etc/php/conf.d/custom.ini

# Copie du code source
COPY . /var/www/html

# Correction des permissions pour Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html

# Exposer le bon port
EXPOSE 80

# Lancer Apache en premier plan
CMD ["apache2-foreground"]
