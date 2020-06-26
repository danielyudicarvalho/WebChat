<?php

require '../vendor/autoload.php';
use webchat\config\Connection;

Connection::createTables();

new webchat\Routes;
?>