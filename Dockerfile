# Usar una imagen base LAMP (Linux, Apache, MySQL, PHP)
FROM php:8.2-apache

# Instalar MySQL y otras dependencias
RUN apt-get update && apt-get install -y mysql-server

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos de la aplicación a la imagen
COPY ./App/ .

# Exponer el puerto 80
EXPOSE 80

# Comando para iniciar Apache
CMD ["apache2-foreground"]
