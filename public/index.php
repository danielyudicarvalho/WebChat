<?php

require '../vendor/autoload.php';
use webchat\infra\config\Connection;

Connection::createTables();

new webchat\infra\Routes;
?>