<?php

session_start();

include ('config.php');

include ('system/system.php');
include ('system/controller.php');
include ('system/model.php');

$system = new System;
$system->run();



?>