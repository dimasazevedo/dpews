<?php include("header.php");
include ("menu.php");

verificaUsuario();
?>
<div class="container">
  <div class="principal">
    <h1>Bem vindo!</h1>
     <?php if(usuarioEstaLogado()) {?>
      <p class="">Você está logado como, <?=$_SESSION['UsuNome']?>	  
      <?php }?>
  </div>
    
    
      <?php
	  
        /*function file_get_contents_curl($url) {
        $ch = curl_init();		
        curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		$data = curl_exec($ch);
		curl_close($ch);
        return $data;
        }
        
		$variavel = file_get_contents_curl('http://www.revistadostribunais.com.br/maf/api/v1/authenticate.json?sp=FED-3');
		$variavel = explode('"', $variavel);
		*/
		function getTokenByUrl($url)
		{
			$token = file_get_contents($url);
			$arrContextOptions=array(
				"ssl"=>array(
				"verify_peer"=>false,
				"verify_peer_name"=>false,
			),
			);  
			

			$token = file_get_contents($url,false,stream_context_create($arrContextOptions));
			$data = json_decode($token, TRUE);
			$tokenvalid = $data["token"];
			
			/*function getTokenByUrl($url){
				$token = file_get_contents($url);
				echo ( $token );
				$data = json_decode($token, TRUE);
				//echo ( $data[] );
				$tokenvalid = $data["token"];
 
				return $tokenvalid;
			}*/
	
		return $tokenvalid;
		}

		//$tokenvalid = getTokenByUrl('http://www.revistadostribunais.com.br/maf/api/v1/authenticate.json?sp=FED-3');
		$tokenvalid = getTokenByUrl('http://www.revistadostribunais.com.br/maf/api/v1/authenticate.json?sp=DPE-3');
		
        ?>
    
        

	<div id="acesso" align="center">   
		<a target="_blank" href="http://www.revistadostribunais.com.br/maf/app/authentication/signon?sso-token=<?php echo $tokenvalid;?>">
			<input type="button" value="Clique aqui para acessar Revista dos Tribunais Online"> </input> 
		</a> 
	</div>
		 
		 
		 
		 
       
       <script language="javascript">
				function abrir() {
                    window.open('<?php echo $data; ?>');
            }
       </script>
        
       <script>
	  var intervalo = window.setInterval(checaSessao,60* 1000);
            function checaSessao() {
                console.log('checando sessao');
                verificaUsuario();
            }
            //clearInterval(intervalo);
       </script>
<?php include("rodape.php");?>
