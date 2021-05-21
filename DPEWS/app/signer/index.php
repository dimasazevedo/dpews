<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  

  <body>
    

    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>
	
	
	<label for="input-folder-3">Select files/folders</label>
		<div class="file-loading">
			<input id="input-folder-3" name="input-folder-3[]" type="file" multiple>
		</div>
		
		<script>
			$(document).ready(function() {
				$("#input-folder-3").fileinput({
				uploadUrl: "/file-upload-batch/2",
			    hideThumbnailContent: true // hide image, pdf, text or other content in the thumbnail preview
				});
			});
		</script>
		
		
		<div id="acesso" align="center">   
			<a target="_blank" href="http://www.revistadostribunais.com.br/maf/app/authentication/signon?sso-token=<?php echo $tokenvalid;?>">
				<input type="button" value="Clique aqui para acessar Revista dos Tribunais Online"> </input> 
			</a> 
		</div>
	
  </body>
  
  
</html>