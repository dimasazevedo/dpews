 <!-- 
 Description: admin.php - page for list,add,edit and delete records 
 Authot: Dimas Azevedo
 Email: dimasazevedo@hotmail.com
 Used links : https://materializecss.com/modals.html#! 
 http://leandrolisura.com.br/como-usar-varias-versoes-do-jquery-na-mesma-pagina/#:~:text=Descobri%20que%20existe%20uma%20maneira,basta%20utilizar%20a%20fun%C3%A7%C3%A3o%20noConflict.
 -->
 
 
 <?php include("header.php");
include ("menu.php");

verificaUsuario();
?>

  <!--<title>Cadastro de Usuários no RT</title>-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <script>var $j2 = jQuery.noConflict();</script>   

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script>var $j3 = jQuery.noConflict();</script>
   <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->w
   
  <!-- -->	
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:100px;
   }
  </style>
   
  
<script>
$j3(document).ready(function(){
	 
  //init modal materialize using JQuery
  $(".modal").modal({ dismissible: true });
 
  
 fetchUser(); //This function will load all data on web page when page load
 function fetchUser() // This function will fetch data from table and display under <div id="result">
 {
  var action = "Load";
  $j3.ajax({
   url : "action.php", //Request send to "action.php page"
   method:"POST", //Using of Post method for send data
   data:{action:action}, //action variable data has been send to server
   success:function(data){
	   console.log(data);
    $('#result').html(data); //It will display data under div tag with id result
   }
  });
 }
 
 /*$(".modal").modal({
dismissible: true
});*/

 //This JQuery code will Reset value of Modal item when modal will load for create new records
 $('#modal_button').click(function(){
  $('#customerModal').modal('open'); //It will load modal on web page
  $('#login').val(''); //This will clear Modal first name textbox
  $('#senha').val(''); //This will clear Modal last name textbox
  $('#nome').val(''); //This will clear Modal first name textbox
  $('#classe').val(''); //This will clear Modal last name textbox
  $('#email').val(''); //This will clear Modal first name textbox
  $('#ativo').val(''); //This will clear Modal last name textbox
  $('#tipo').val(''); //This will clear Modal first name textbox
  //$('#emuso').val(''); //This will clear Modal last name textbox
  $('.modal-title').text("Criar novo usuário"); //It will change Modal title to Create new Records
  $('#action').val('Criar'); //This will reset Button value ot Create
 });

 //This JQuery code is for Click on Modal action button for Create new records or Update existing records. This code will use for both Create and Update of data through modal
 $('#action').click(function(){
	 
	 
  var login =  $('#login').val();  
  var senha =  $('#senha').val();	   
  var nome = $('#nome').val(); //Get the value of first name textbox.    
  var classe = $('#classe').val();  
  var email =  $("#email").val();  
  var ativo = $("#ativo").val();  
  var tipo = $("#tipo").val();  
  var id = $("#id_c").val();  //Get the value of hidden field customer id  
  var action = $("#action").val();  //Get the value of Modal Action button and stored into action variable
    
  
  console.log(action);
  if( login != '') //This condition will check both variable has some value
  {	  
   $.ajax({
    url : "action.php",    //Request send to "action.php page"
    method:"POST",     //Using of Post method for send data
    data:{ login:login, senha:senha,nome:nome,classe:classe,email:email,ativo:ativo,tipo:tipo,id:id, action:action}, //Send data to server
    success:function(data){
     alert(data);    //It will pop up which data it was received from server side
     $('#customerModal').modal('close'); //It will hide Customer Modal from webpage.
	 
     fetchUser();    // Fetch User function has been called and it will load data under divison tag with id result    
    }
   });
  }
  else
  {
   alert("Estes campos são requeridos"); //If both or any one of the variable has no value them it will display this message
  }
 });

 
 //This JQuery code is for Update customer data. If we have click on any customer row update button then this code will execute
 $j3(document).on('click', '.update', function(){
	  
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  var action = "Select";   //We have define action variable value is equal to select
  $j3.ajax({
   url:"action.php",   //Request send to "aposta-action.php page"
   method:"POST",    //Using of Post method for send data
   data:{id:id, action:action},//Send data to server
   dataType:"json",   //Here we have define json data type, so server will send data in json format.
   success:function(resp){
    $('#customerModal').modal('open');   //It will display modal on webpage
    $('.modal-title').text("Atualizar registros"); //This code will change this class text to Update records
    $('#action').val("Update");     //This code will change Button value to Update
	console.log(resp);
	$('#id_c').val(id);     //It will define value of id variable to this customer id hidden field
	
	var l = resp.login;
	$('#login').val(l);  //It will assign value to modal first name texbox
	
	var s = resp.senha;
	$('#senha').val(s);  //It will assign value of modal last num_apostadores textbox
	
	var n = resp.nome;
	$('#nome').val(n);  //It will assign value of modal last num_apostadores textbox
	
	var c = resp.classe;
	$('#classe').val(c);
	
	var e = resp.email;
	$('#email').val(e);
	
	var a = resp.ativo;
	$('#ativo').val(a);
	
	var t = resp.tipo;
	$('#tipo').val(t);	
		
   }
  });
 });
 

 //This JQuery code is for Delete customer data. If we have click on any customer row delete button then this code will execute
 $(document).on('click', '.delete', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  if(confirm("Deseja realmente excluir?")) //Confim Box if OK then
  {
   var action = "Delete"; //Define action variable value Delete
   $.ajax({
    url:"action.php",    //Request send to "action.php page"
    method:"POST",     //Using of Post method for send data
    data:{id:id, action:action}, //Data send to server from ajax method
    success:function(data)
    {
     fetchUser();    // fetchUser() function has been called and it will load data under divison tag with id result
     alert(data);    //It will pop up which data it was received from server side
    }
   })
  }
  else  //Confim Box if cancel then 
  {
   return false; //No action will perform
  }
 });
});
</script>

     
 <!-- admin php -->
 <div class="container box">     
 
   <h1 align="center">Cadastro de Usuários</h1>
   <br />
   <div align="right">
    <button type="button" id="modal_button" class="btn btn-info">Cadastrar</button>
    <!-- It will show Modal for Create new Records !-->
   </div>
   <br />
   <div id="result" class="table-responsive"> <!-- Data will load under this tag!-->

   </div>
  </div>



<!-- This is Customer Modal. It will be use for Create new Records and Update Existing Records!-->
<div id="customerModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Novo Usuário</h4>
   </div>
   <div class="modal-body">
    <label>Login:</label>
    <input type="text" name="login" id="login" class="form-control" />
    <br />
    <label>Senha</label>
    <input type="password" name="senha" id="senha" class="form-control" />
    <br />
	<label>Nome</label>
    <input type="text" name="nome" id="nome" class="form-control" />
    <br />
	<label>Classe</label>
    <input type="text" name="classe" id="classe" class="form-control" />
    <br />
	<label>Email</label>
    <input type="text" name="email" id="email" class="form-control" />
    <br />
	<label>Ativo</label>
    <input type="text" name="ativo" id="ativo" class="form-control" />
    <br />
	<label>Tipo</label>
    <input type="text" name="tipo" id="tipo" class="form-control" />
    <br />
    </div>
   <div class="modal-footer">
    <input type="hidden" name="id_c" id="id_c" />
    <input type="submit" name="action" id="action" class="class="btn btn-default" />
    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>-->
	<a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
   </div>
  </div>
 </div>
</div>


<?php include("rodape.php");?>




