<?php 

require __DIR__ . '/../../config/init.php';

session_destroy();
header('location:/controllers/website/user_connect-ctrl.php');