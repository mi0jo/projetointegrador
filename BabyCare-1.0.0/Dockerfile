FROM php:8.2-apache

# Instala extensões PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Ativa mod_rewrite
RUN a2enmod rewrite

# Copia os arquivos do projeto
COPY . /var/www/html/

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Garante que o Apache pode acessar a pasta
RUN echo "<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>" >> /etc/apache2/apache2.conf
