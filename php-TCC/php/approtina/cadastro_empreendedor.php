<?php

$con=mysqli_connect("localhost","id21991419_ruser","appRotina10.","id21991419_approtina");  // o usuario e a senha do banco e o nome do banco de dados

$nome=$_POST["nome_empreendedor"];
$cpf=$_POST["cpf_empreendedor"];



    $comando= "Insert into TB_EMPREENDEDOR(NOME_EMPREENDEDOR,CPF_EMPREENDEDOR) values
    ( '$nome','$cpf')";
    $resulta = mysqli_query($con,$comando);

    if ($resulta!=0) {
       $dados=array("status"=>"ok");
      }
    else{   $dados=array("status"=>"erro");
      
      }
$close = mysqli_close($con);
echo json_encode($dados);
?>