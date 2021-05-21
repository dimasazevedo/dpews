<?php

//adicionado por Dimas Azevedo
session_cache_limiter('private'); /* define o limitador de cache para 'private' */
$cache_expire = session_cache_expire(5); /* define o prazo do cache em n minutos */

session_start();
iniciaTempoSessao();

function usuarioEstaLogado(){
  return isset($_SESSION["usuario_logado"]);
}

function iniciaTempoSessao()
{
    
    if(!isset($_SESSION['start_login']))
    { // se não tiver pego tempo que logou
        $_SESSION['start_login'] = time(); //pega tempo que logou
        // adiciona 30 segundos ao tempo e grava em outra variável de sessão
        $_SESSION['logout_time'] = $_SESSION['start_login'] + 300; 
    }
    
}

function verificaTempoSessao()
{
    
    // se o tempo atual for maior que o tempo de logout
    if(time() >= $_SESSION['logout_time']) 
    { 
        //header("location:logout.php"); //vai para logout
        session_destroy();
    } 
    else
    {
        $red = $_SESSION['logout_time'] - time(); // tempo que falta
        //echo "Início de sessão: ".$_SESSION['start_login']."<br>";        
    } 
   
}

function verificaUsuario()
{
      verificaTempoSessao();
      if(!usuarioEstaLogado()) {
      $_SESSION["danger"] = "Você não está logado";
      header("Location: login.php?falhaDeSeguranca=true");
      die();   
    }
}

function usuarioLogado(){
  return $_SESSION["usuario_logado"];
}

function logaUsuario($UsuLogin){
  $_SESSION["usuario_logado"] = $UsuLogin;
}

//adicionado por Dimas Azevedo
function obtemIDUsuarioLogado()
{
   return $_SESSION["IdUsu"];
}

function logout(){
  session_destroy();
  session_start();
}


