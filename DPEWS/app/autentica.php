<?php include("conecta.php");;
include("banco-usuario.php");
include ("logica-usuario.php");

$usuario = buscaUsuario($conexao, $_POST["UsuLogin"], $_POST["UsuSenha"]);
if($usuario == null) {
  $_SESSION["danger"] = "Usuário ou senha inválida!";
  header("Location: login.php");
} else if($usuario['UsuAtivo'] == 0) {
  $_SESSION["danger"] = "Usuário está inativo, procure a Administração";
  header("Location: login.php");
} 
// adicionado por Dimas Azevedo 
/*else if($usuario['UsuEmUso'] == 1)
{
  $_SESSION["danger"] = "Usuário já está em uso, deslogue primeiro antes de continuar";
  header("Location: login.php");  
}*/
else //sucesso na autenticacao
{
  date_default_timezone_set('America/Manaus');
  $date = date('Y-m-d H:i:s');
  //echo $date;
  atualizaDataHoraLogin($conexao,$usuario['IdUsu'], $date);
  
    
  logaUsuario($usuario["UsuLogin"]);
  $_SESSION['UsuNome'] = $usuario['UsuNome'];
  $_SESSION['UsuTipo'] = $usuario['UsuTipo'];
  $_SESSION["IdUsu"]   = $usuario['IdUsu'];
  atualizaUsuarioEmUso($conexao, 1, $_SESSION["IdUsu"] );
  
  //incluir redirect para página de admin  
  if($usuario['Usutipo'] == 1) {
   header("Location: admin.php");
  }
  else{
    header("Location: index.php?UsuLogin=true");
  }
 
}
die();
