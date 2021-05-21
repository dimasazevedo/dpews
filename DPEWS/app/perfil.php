<?php include("header.php");
include("menu.php");
include("conecta.php");
include("banco-usuario.php");

verificaUsuario();

//$usuario = listaUsuario($conexao); editado por Dimas Azevedo

$id = obtemIDUsuarioLogado();
$usuario = buscaUsuarioLogado($conexao, $id);

?>


<style>
.card {
  margin-top: 30px;
}

</style>

<body class="grey lighten-4">
  <div class="container">
    <div class="row">
     <form action="atualiza-perfil.php" method="post">
      <div class="card">
        <div class="card-content">
          <span class="card-title black-text">Minha Conta</span></br>
        </br><span class="card-legend black-text">Informações gerais</span>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" value="<?php echo $usuario['UsuNome'];?>" name="UsuNome" class="validate">
              <label for="icon_prefix">Nome</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">email</i>
              <input id="icon_prefix" type="text" value="<?php echo $usuario['UsuEmail'];?>" name="UsuEmail" class="validate">
              <label for="icon_prefix">E-mail</label>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-content">
        <span class="card-legend black-text">Informações de login</span>
            <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" value="<?php echo $usuario['UsuLogin'];?>" name="UsuLogin" class="validate">
              <label for="icon_prefix">Login</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">vpn_key</i>
              <input id="icon_prefix" type="text" value="<?php echo $usuario['UsuSenha'];?>" name="UsuSenha" class="validate">
              <label for="icon_prefix">Senha</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Salvar alterações
              <i class="material-icons right">edit</i>
            </button>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>


<?php include("rodape.php");?>
