<?php

$con=mysqli_connect("localhost","id22131576_wise_invest","caNNabis420.","id22131576_wise_invest");  // o usuario e a senha do banco e o nome do banco de dados

if (mysqli_connect_errno()) {
  $dados = array("status" => "erro", "mensagem" => "Falha na conexão com o banco de dados: " . mysqli_connect_errno());
  echo json_encode($dados);
  exit();
}

//$email="joao@gmail.com";
//$senha="teste321";
$email=$_POST["email"];
$senha=$_POST["senha"];
$status="ATIVO";



    $comando= "Insert into TB_USUARIO(EMAIL_USUARIO,SENHA_USUARIO, STATUS_USUARIO) values
    ( '$email','$senha','$status')";
    $resulta = mysqli_query($con,$comando);

    if ($resulta) {
      $id_usuario = mysqli_insert_id($con); //obtendo cahve primaria criada com auto increment
      header("location: https://wise1nvest.000webhostapp.com/projeto/site/src/pages/index.html");
      }
    else{   $dados=array("status"=>"erro");
      
      }
$close = mysqli_close($con);
echo json_encode($dados);
?>