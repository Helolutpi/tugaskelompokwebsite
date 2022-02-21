<?php 

session_start();
session_destroy();

header("Location: index.php");
//mengarahkan ke index.php
?>