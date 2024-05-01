# Utiliza una imagen base de Ubuntu
FROM ubuntu:latest

# Establece variables de entorno para evitar interacciones interactivas
ENV DEBIAN_FRONTEND=noninteractive
ENV TZ=UTC

# Actualiza el sistema e instala los paquetes necesarios
RUN apt-get update && apt-get install -y \
    apache2 \
    mysql-server \
    php \
    libapache2-mod-php \
    php-mysql

# Copia los archivos del sitio web al directorio del servidor web de Apache
COPY . /var/www/html

# Configura Apache
RUN a2enmod rewrite

# Expone el puerto 80 para que sea accesible desde el host
EXPOSE 80

# Inicia los servicios de Apache y MySQL
CMD service apache2 start && service mysql start && tail -f /var/log/apache2/access.log
