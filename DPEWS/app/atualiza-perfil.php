<html> 
<head>
    <title>Atualiza Perfil</title>
    <meta http-equiv="refresh" content="5; URL=index.php">
</head>   

<?php include("header.php");
include("menu.php");
include("conecta.php");
include("banco-usuario.php");

verificaUsuario();

$id = obtemIDUsuarioLogado();
//variaveis vindas pelo formulario
$nome = $_POST[ 'UsuNome'];
$email = $_POST['UsuEmail'];
$login = $_POST['UsuLogin'];
$senha = $_POST['UsuSenha']; 

//funcao para criptografar a senha
$senha = md5($senha);

$query = "UPDATE usuarios SET UsuNome='$nome', UsuEmail='$email', UsuLogin='$login', UsuSenha='$senha' WHERE IdUsu=$id";
if (mysqli_query($conexao, $query)){
    ?> 
        <div align="center">
            <p class=""> Perfil alterado com sucesso!</p>
              Você será redirecionado para a página principal:</br>
            <label id="lblTime" for="exemplo"></label>
        </div>
    <?php } else { ?>
        <p class=""> Erro </p>
    <?php
    }
?>
<?php include("rodape.php");?>


        
        <!-- cria animacao para o texto do timer -->  
  <script>  
  	var start = null;
  	var element = document.getElementById('lbltime');
  	element.style.position = 'absolute';

  	function step(timestamp) {
    	if (!start) start = timestamp;
    	var progress = timestamp - start;
    	element.style.left = Math.min(progress / 10, 200) + 'px';
    	if (progress < 100) {
      		window.requestAnimationFrame(step);
    	}
  }
  window.requestAnimationFrame(step);
  </script>
  

<!-- Exibe contador do time na pagina -->
	  <script>
	  var counter = 200;
	  
	  function myTimer() {
	    var timer = setTimeout( function() {
	  	  //alteraLabel(counter-- +' segundos...');
                  alteraLabel('Carregando...');
	       if( counter > 0 ) {    
	        myTimer();
	      }
	    }, 1000 );
	  }
	    
	  myTimer();
	  
	  function alteraLabel(texto) {
		  document.getElementById("lblTime").innerHTML =texto;
		}
  </script>

            
</body> 

</html>