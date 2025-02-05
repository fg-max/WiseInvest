<?php

$con=mysqli_connect("localhost","id21991419_ruser","appRotina10.","id21991419_approtina");  // o usuario e a senha do banco e o nome do banco de dados

$email=$_POST["EMAIL_USUARIO"];
$senha=$_POST["SENHA_USUARIO"];



    $comando= "Insert into TB_USUARIO(NOME_USUARIO,SENHA_USUARIO) values
    ( '$email','$senha')";
    $resulta = mysqli_query($con,$comando);

    if ($resulta!=0) {
       $dados=array("status"=>"ok");
      }
    else{   $dados=array("status"=>"erro");
      
      }
$close = mysqli_close($con);
echo json_encode($dados);
?>