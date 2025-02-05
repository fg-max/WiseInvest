<?php

$con=mysqli_connect("localhost","id21991419_ruser","appRotina10.","id21991419_approtina");  // o usuario e a senha do banco e o nome do banco de dados

$nome=$_POST["nome_estudante"];
$cpf=$_POST["cpf_estudante"];
$instituicao=$_POST["instituicao_estudante"];
$matricula=$_POST["matricula_estudante"];
$curso=$_POST["curso_estudante"];
$area=$_POST["area_estudante"];

    $comando= "Insert into acesso(nome_estudante,cpf_estudante,instituicao_estudante,matricula_estudante,curso_estudante,area_estudante) values
    ( '$nome','$cpf','$instituicao','$matricula','$curso','$area')";
    $resulta = mysqli_query($con,$comando);

    if ($resulta!=0) {
       $dados=array("status"=>"ok");
    }
    else
      {   $dados=array("status"=>"erro");


}
$close = mysqli_close($con);
echo json_encode($dados);
?>