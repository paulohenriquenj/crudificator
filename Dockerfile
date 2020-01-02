FROM php:7.2-fpm 
WORKDIR /home
COPY docker-entrypoint.sh /usr/local/bin/
# RUN ln -s docker-entrypoint.sh /
RUN chmod 777 /docker-entrypoint.sh
COPY . /home
RUN apt-get update 
RUN apt-get install git zip unzip -y
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"\
	&& php composer-setup.php\
	&& php -r "unlink('composer-setup.php');"
RUN ls -al
RUN ./composer.phar install
WORKDIR /code
ENTRYPOINT ["bash","-c","docker-entrypoint.sh"]
