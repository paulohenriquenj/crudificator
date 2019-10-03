FROM php:7.2-fpm 
WORKDIR /home
COPY docker-entrypoint.sh /usr/local/bin/
RUN ln -s usr/local/bin/docker-entrypoint.sh /
RUN chmod 777 /docker-entrypoint.sh
COPY . /home
RUN apt-get update 
RUN apt-get install git zip unzip -y
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"\
	&& php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"\
	&& php composer-setup.php\
	&& php -r "unlink('composer-setup.php');"
RUN ls -al
RUN ./composer.phar install
WORKDIR /code
ENTRYPOINT ["bash","-c","docker-entrypoint.sh"]
