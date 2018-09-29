<?php
/**
 * Created by PhpStorm.
 * User: tassio
 * Date: 09/01/2018
 * Time: 16:24
 */

//ini_set('display_errors', 0);

try {
    $pdo = new PDO('mysql:host=localhost;dbname=sga', 'root', '!@#$1234');
    $pdo->exec("set names utf8");
} catch ( PDOException $e ) {
    echo 'Erro ao conectar com o Banco: ' . $e->getMessage();
    exit(1);
}