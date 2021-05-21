
<html>
    <head>
        <title>Carregando varios jQuerys</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>Retorno de <i>$().jquery</i>: <strong><span id="v1"></span></strong></div>
        <div>Retorno de <i>$j2().jquery</i>: <strong><span id="v2"></span></strong></div>
        <div>Retorno de <i>$j3().jquery</i>: <strong><span id="v3"></span></strong></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script>var $j2 = jQuery.noConflict(true);</script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>var $j3 = jQuery.noConflict(true);</script>
        <script>
            $(document).ready(function () {
                $j3('#v1').html($().jquery);
                $j2('#v2').html($j2().jquery);
                $('#v3').html($j3().jquery);
            });
        </script>
    </body>
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	 <script>var $j2 = jQuery.noConflict(true);</script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script>var $j3 = jQuery.noConflict(true);</script>
	 
</html>