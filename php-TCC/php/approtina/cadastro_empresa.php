<?php

$con=mysqli_connect("localhost","id21991419_ruser","appRotina10.","id21991419_approtina");  // o usuario e a senha do banco e o nome do banco de dados

$nome=$_POST["NOME_EMPRESA"];
$cnpj=$_POST["CNPJ_EMPRESA"];
$capitalAtivo=$_POST["CAPITAL_EMPRESA"];
$razaoSocial=$_POST["RAZAO_SOCIAL_EMPRESA"];
$status=$_POST["STATUS_EMPRESA"];


$comando= "Insert into TB_EMPRESA(NOME_EMPRESA,CNPJ_EMPRESA,CAPITAL_EMPRESA,RAZAO_SOCIAL_EMPRESA,STATUS_EMPRESA) values
    ( '$nome','$cnpj','$capitalAtivo','$razaoSocial', '$status')";
    $resulta = mysqli_query($con,$comando);

    if ($resulta!=0) {
       $dados=array("status"=>"ok");
      }
    else{   $dados=array("status"=>"erro");
      
      }
$close = mysqli_close($con);
echo json_encode($dados);
?>