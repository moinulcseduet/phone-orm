Moinul Phone list Application
========================

This is both service and front layer of phone list application!

Installation
------------

1. Install composer:

    curl -s http://getcomposer.org/installer | php

2. Install the vendor libraries by running composer:

    php composer.phar install

    and

    create database phone_orm and import phone_orm.sql

2. Setup a VirtualHost with the following configuration (modify as needed):

    <VirtualHost *:80>

        ServerName www.phone-orm.dev
        DocumentRoot "/var/www/phone-orm/web"

        <Directory "/var/www/phone-orm/web">
            Options Indexes FollowSymLinks MultiViews
            AllowOverride All
            Allow from All
        </Directory>

    </VirtualHost>

    and create app/Resources/assets folder symlink

    ln -s app/Resources/assets assets

3. Visit the site at http://www.phone-orm.dev/phone

4. Enjoy!
