<?php

$con=mysqli_connect("localhost","id21991419_ruser","appRotina10.","id21991419_approtina");  // o usuario e a senha do banco e o nome do banco de dados

$nome=$_POST["NOME_STARTUP"];
$capitalStartup=$_POST["CAPITAL_STARTUP"];
$areaStartup=$_POST["AREA_STARTUP"];
$cnpj=$_POST["CNPJ_STARTUP"];
$razaoSocial=$_POST["RAZAO_SOCIAL_STARTUP"];
$socios=$_POST["SOCIOS_STARTUP"];
$status=$_POST["STATUS_STARTUP"];


    $comando= "Insert into TB_STARTUP(NOME_STARTUP,CAPITAL_STARTUP,AREA_STARTUP,CNPJ_STARTUP,RAZAO_SOCIAL_STARTUP,SOCIOS_STARTUP,STATUS_STARTUP) values
    ( '$nome','$capitalStartup',$areaStartup','$cnpj,$razaoSocial','$socios','$status')";
    $resulta = mysqli_query($con,$comando);

    if ($resulta!=0) {
       $dados=array("status"=>"ok");
      }
    else{   $dados=array("status"=>"erro");
      
      }
$close = mysqli_close($con);
echo json_encode($dados);
?>