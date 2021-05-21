<?php 
include("conecta.php");;
include("banco-usuario.php");
include ("logica-usuario.php");

//atualizaUsuarioEmUso($conexao, 0, $_SESSION["IdUsu"] );
logout();
$_SESSION["success"] = "Usuário deslogado com sucesso!";
header("location: login.php");
die();
