<?php

function buscaUsuario($conexao, $UsuLogin, $UsuSenha) {
  $UsuSenha = md5($UsuSenha);
  $query = "select * from usuarios where UsuLogin='{$UsuLogin}' and UsuSenha='{$UsuSenha}'";
  $resultado = mysqli_query($conexao, $query);
  $usuario = mysqli_fetch_assoc($resultado);  
  return $usuario;
}

function listaUsuario($conexao) {
  $usuarios = array();
  $resultado= mysqli_query($conexao, "select * from usuarios");
  while ($usuario = mysqli_fetch_assoc($resultado)) {
    array_push($usuarios, $usuario);
  }
  return $usuario;
}

//Adicionado por Dimas Azevedo
function buscaUsuarioLogado( $conexao, $IdUsu){
    $query = "select * from usuarios where IdUsu='{$IdUsu}' ";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);  
    return $usuario;
}

function atualizaDataHoraLogin(  $conexao, $IdUsu, $DataHoraUsu)
{
	//escrever update do banco
	$query = "update SET UsuDataHora='".$DataHoraUsu."'  from usuarios where IdUsu='{$IdUsu}' ";
	echo (  $query );
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);  
    return $usuario;
}

//funcao implementada para controlar numero de sessoes abertas por um usuário
function atualizaUsuarioEmUso( $conexao,$param, $id)
{
    $query = "UPDATE usuarios SET UsuEmUso=$param WHERE IdUsu=$id"; //atualiza indicando que nao esta mais em uso
    
    if (mysqli_query($conexao, $query))
    {
       echo ('success') ;
    }
    else { ?>
        <p class=""> Erro ao atualizar registro </p>
    <?php
    }
    
}



 ?>
