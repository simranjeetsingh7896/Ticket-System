<?php

require_once "models/loginData.php";

session_start();
session_destroy();
header("Location: ./index.php");

?>