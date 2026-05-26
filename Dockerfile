

# Usamos la imagen oficial de PHP con Apache
FROM php:8.2-apache

# ¡ESTA LÍNEA ES LA CLAVE! Instala los drivers de MySQL que te están faltando
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copia los archivos de tu proyecto al contenedor
COPY . /var/www/html/

# Expone el puerto 80
EXPOSE 80