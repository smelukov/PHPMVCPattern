<?php
$controller = new MainController(new MainModel(), new MainView('index.php'));
$controller->action();
