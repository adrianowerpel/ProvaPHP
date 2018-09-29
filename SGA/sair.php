<?php
/**
 * Created by PhpStorm.
 * User: tassio
 * Date: 10/01/2018
 * Time: 10:39
 */

session_start();
unset($_SESSION['usuario']);
unset($_SESSION['senha']);
session_destroy();
header('location:index.php');

?>