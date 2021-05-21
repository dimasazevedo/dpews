<?php include("header.php");
include_once "logica-usuario.php";
?>
<body>
  <ul id="dropdown1" class="dropdown-content">
  <li><a href="perfil.php">Perfil</a></li>
  <li class="divider"></li>
  <li><a href="logout.php">Sair</a></li>
</ul>
  <nav>
     <div class="teal darken-1 nav-wrapper">
      <a href="#" class="brand-logo center">SCAWEB</a>      
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href=""><i class="material-icons left">home</i>Início</a></li>        
      </ul>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <!--<li><a href="#"><i class="material-icons left">message</i>Mensagens<span class="new badge blue" data-badge-caption="nova">0</span></a></li>-->        
        <li><a class="dropdown-button" href="#" data-activates="dropdown1"><i class="material-icons left">account_circle</i>Minha conta<i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
    </div>   
  </nav>
  </body>
