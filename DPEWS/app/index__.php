<?php 
function file_get_contents_curl($url) {
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
?>
<a href="http://www.revistadostribunais.com.br/maf/app/authentication/signon?sso-token=<?php echo $variavel[3];?>"><input type="button" value="Clique aqui para acessar Revista dos Tribunais Online" onclick="abrir();"></input></a>


<html> 
<head>
                        <title>Teste</title>
                        <script language="javascript">
                                               function abrir() {
                                                                       window.open('<?php echo $data; ?>');
                                               }
                        </script>
</head>
<body>
         
            
</body> 

</html>


