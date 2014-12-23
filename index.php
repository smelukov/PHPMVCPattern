<?php
require_once "vendor/composer/autoload.php";
$controller = new MainController(new MainModel(), new MainView('index'));
$controller->action();
