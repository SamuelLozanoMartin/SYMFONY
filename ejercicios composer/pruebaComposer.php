<?php
require 'C:\xampp\lib composer\vendor/autoload.php';
$log = new Monolog\Logger('name');
$log->pushHandler(
    new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING)
);
 
$log->addWarning('Foo');

?>