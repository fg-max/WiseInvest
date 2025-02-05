<?php

$con=mysqli_connect("localhost","id21991419_ruser","appRotina10.","id21991419_approtina");  // o usuario e a senha do banco e o nome do banco de dados

$loginx=$_POST["EMAIL_USUARIO"];
$senhax=$_POST["SENHA_USUARIO"];

    $comando= "update TB_USUARIO set senha='$senhax' where usuario='$loginx'";
    $resulta = mysqli_query($con,$comando);
    $quant=mysqli_affected_rows($con);  //pega a quantidade de registros alterados
       
          if (   $quant>0) {
       $dados=array("status"=>"ok");
    }
    else
      {   $dados=array("status"=>"erro");

}

$close = mysqli_close($con);
echo json_encode($dados);
?>