<?php

defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'dev'));

if (APPLICATION_ENV == 'dev') {
    require 'app_dev.php';
} else {
    require 'app.php';
}