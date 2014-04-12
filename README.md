LooseMonkies.com Service
========================

This is the service layer of LooseMonkies.com!

Installation
------------

1. Install composer:

    curl -s http://getcomposer.org/installer | php

2. Install the vendor libraries by running composer:

    php composer.phar install

2. Setup a VirtualHost with the following configuration (modify as needed):

    <VirtualHost *:80>

        ServerName api.loosemonkies.dev
        DocumentRoot "/Users/emran/Sites/lm/lm-service/web"

        <Directory "/Users/emran/Sites/lm/lm-service/web">
            Options Indexes FollowSymLinks MultiViews
            AllowOverride All
            Allow from All
        </Directory>

    </VirtualHost>

3. Visit the site at http://api.loosemonkies.dev/user

4. Enjoy!
