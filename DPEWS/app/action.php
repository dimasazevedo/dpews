<?php
//Database connection by using PHP PDO
$username = 'root';
$password = ''; //pass for homologation
$connection = new PDO( 'mysql:host=localhost;dbname=sistema_login', $username, $password ); // Create Object of PDO class by connecting to Mysql database

if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
 {
  $statement = $connection->prepare("SELECT * FROM usuarios ORDER BY IdUsu");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
     <th width="10%">id</th>
     <th width="20%">login</th>	 
	 <th width="20%">nome</th>	 
	 <th width="20%">email</th>
	 <th width="2%">ativo</th>	 
     <th width="10%">Atualizar</th>
     <th width="10%">Deletar</th>
    </tr>
  ';
  if($statement->rowCount() > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td>'.$row["IdUsu"].'</td>
     <td>'.$row["UsuLogin"].'</td>	 
	 <td>'.$row["UsuNome"].'</td>	 
	 <td>'.$row["UsuEmail"].'</td>
	 <td>'.$row["UsuAtivo"].'</td>	 	 
     <td><button type="button" id="'.$row["IdUsu"].'" class="btn btn-warning btn-xs update">Atualizar</button></td>
     <td><button type="button" id="'.$row["IdUsu"].'" class="btn btn-danger btn-xs delete">Deletar</button></td>
    </tr>
    ';
   }
  }
  else
  {
   $output .= '
    <tr>
     <td align="center">Dados não encontrados!</td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }

 //This code for Create new Records
 if($_POST["action"] == "Criar")
 {
   echo 'Funcao Criar-->'; 
   $senha = md5( $_POST["senha"] );
   $statement = $connection->prepare("INSERT INTO usuarios (UsuLogin,UsuSenha,UsuNome,UsuClasse,UsuEmail,UsuAtivo,Usutipo)
                                      VALUES (:login,:senha,:nome,:classe,:email,:ativo,:tipo)");
  $result = $statement->execute(
   array(
    ':login' => $_POST["login"],
    ':senha' => $senha,
	':nome' => $_POST["nome"],
	':classe' => $_POST["classe"],
	':email' => $_POST["email"],
	':ativo' => $_POST["ativo"],	
	':tipo' => $_POST["tipo"]
	//':emuso' => $_POST["emuso"]
   )
  );
  if(!empty($result))
  {
   echo 'Dados foram gravados!';
  }
 }

 //This Code is for fetch single customer data for display on Modal
 if($_POST["action"] == "Select")
 {
  $output = array();
  $statement = $connection->prepare(
   "SELECT * FROM usuarios 
   WHERE IdUsu = '".$_POST["id"]."' 
   LIMIT 1"
  );
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $output["login"] = $row["UsuLogin"];   
   $output["senha"] = $row["UsuSenha"];
   $output["nome"] = $row["UsuNome"];
   $output["classe"] = $row["UsuClasse"];
   $output["email"] = $row["UsuEmail"];
   $output["ativo"] = $row["UsuAtivo"];
   $output["tipo"] = $row["Usutipo"];
   //$output["emuso"] = $row["UsuEmUso"];
  }
  echo json_encode($output);
 }

 if($_POST["action"] == "Update")
 {
   $senha = md5( $_POST["senha"] );
   $statement = $connection->prepare("UPDATE usuarios SET UsuLogin = :login, UsuSenha = :senha, UsuNome = :nome, UsuClasse = :classe, UsuEmail = :email,UsuAtivo = :ativo, Usutipo = :tipo 
														  WHERE IdUsu = :id"
  );
 
  
  $result = $statement->execute(
   array(
    ':login' => $_POST["login"],
    ':senha' => $senha,
	':nome' => $_POST["nome"],
	':classe' => $_POST["classe"],
	':email' => $_POST["email"],
	':ativo' => $_POST["ativo"],	
	':tipo' => $_POST["tipo"],
	':id' => $_POST["id"]
	//':emuso' => $_POST["emuso"]	
   )
  );
  if(!empty($result))
  {    
    echo 'Data atualizados!';
  }

 }

 if($_POST["action"] == "Delete")
 {
  $statement = $connection->prepare(
   "DELETE FROM usuarios WHERE IdUsu = :id"
  );
  $result = $statement->execute(
   array(
    ':id' => $_POST["id"]
   )
  );
  if(!empty($result))
  {
   echo 'Dados deletados!';
  }
 }

}

?>
