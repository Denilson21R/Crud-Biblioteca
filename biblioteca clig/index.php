<?php
//Inicia a sessão
session_start();



$_SESSION["root"]="C:/xampp/htdocs/biblioteca clig/";
//print_r($_SESSION["root"] );

//Chamo o arquivo responsável por gerenciar as rotas do sistema

include $_SESSION["root"].'routes.php';
?>