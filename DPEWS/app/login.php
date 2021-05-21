<?php include("header.php");
include ("logica-usuario.php")
;?>

<body class="teal darken-1">
  <div class="section"></div>
  <main class="row">
    <center>
      <div class="section"></div>
      <h5 class="white-text col s12 l12">Por favor, efetue seu login</h5>
      <div class="section"></div>
      <div class="col s12 l12">
        <div class="z-depth-1 white row" style="display: inline-block; padding: 32px 48px 32px 48px; border: 1px solid #EEE; border-radius: 4px;">

          <form action="autentica.php" class="col s12" method="post">
            <div class='row'>
              <div class='col s12'>
                <h5 class=""><img src="../img/favicon.png" height=25px;/>Bem vindo ao controle de usuário da Defensoria</h5>
                <?php if(isset($_SESSION["success"])) {?>
                  <p class="blue-text"><?= $_SESSION["success"]?></p>
                <?php }?>
                <?php if(isset($_SESSION["danger"])) {?>
                  <p class="red-text"><?= $_SESSION["danger"]?></p>
                <?php
                    unset($_SESSION["danger"]);
                    unset($_SESSION["success"]);
              }?>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='UsuLogin' id='text' />
                <label for='text'>Login</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='UsuSenha' id='password' />
                <label for='password'>Senha</label>
              </div>
              <label style='float: right;'>
								<!--<a class='pink-text' href='#!'><b>Esqueceu sua senha?</b></a>-->
							</label>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect'>Login</button>
              </div>
            </center>
          </form>
        </div>
      </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>
<?php include ("rodape.php");?>
