<?php
$loginx=$_POST["EMAIL_USUARIO"];
$senhax=$_POST["SENHA_USUARIO"];


$con=mysqli_connect("localhost","id21991419_ruser","appRotina10.","id21991419_approtina");  // o usuario e a senha do banco e o nome do banco de dados

$comando= "select * from TB_USUARIO where usuario='$loginx' and senha='$senhax'";
$resulta = mysqli_query($con,$comando);
 $dados=array("status"=>"-");
while($r = mysqli_fetch_array($resulta)){
 $dados=array("status"=>"ok","login"=>$r[1],"senha"=>$r[2]);
}
$close = mysqli_close($con);
echo json_encode($dados);
?>