<?php

$con=mysqli_connect("localhost","id21991419_ruser","appRotina10.","id21991419_approtina");  // o usuario e a senha do banco e o nome do banco de dados

$loginx=$_POST["email_usuario"];
$senhax=$_POST["senha_usuario"];


    $comando= "Insert into acesso(usuario,senha,foto) values
    ( '$loginx','$senhax')";
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