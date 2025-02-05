<?php
session_start();
$con=mysqli_connect("localhost","id22131576_wise_invest","caNNabis420.","id22131576_wise_invest");  // o usuario e a senha do banco e o nome do banco de dados

if(mysqli_connect_errno()){
  $dados = array("status" => "erro", "mensagem"=> "Falha na Conexão com banco de dados". mysqli_connect_errno());
  echo json_encode($dados);
  exit();
}

$nome=$_POST["nome_empreendedor"];
$cpf=$_POST["cpf_empreendedor"];
$id_usuario = $_SESSION["id_usuario"];

$stmt = $con->prepare("INSERT INTO TB_EMPREENDEDOR (ID_USUARIO, NOME_EMPREENDEDOR, CPF_EMPREENDEDOR) VALUES(?, ?, ?)");
$stmt->bind_param("iss", $id_usuario, $nome, $cpf);

if($stmt->execute()){
  $dados = array("status" => "ok"); 
  header('location: https://wise1nvest.000webhostapp.com/projeto/site/src/php/home.php');
} else {
  $dados = array("status" => "erro", "mensagem" => "erro ao realizar consulta" . $stmt->error);
}

$stmt->close();

mysqli_close($con);

echo json_encode($dados);
?>
