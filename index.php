<?php
$controller = new MainController(new MainModel(), new MainView('index'));
$controller->action();
