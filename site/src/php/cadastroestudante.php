<?php
session_start();
$con = mysqli_connect("localhost", "id22131576_wise_invest", "caNNabis420.", "id22131576_wise_invest");  // usuário e senha do banco e o nome do banco de dados

// Verifica conexão
if (mysqli_connect_errno()) {
    $dados = array("status" => "erro", "mensagem" => "Falha na conexão com o banco de dados: " . mysqli_connect_errno());
    echo json_encode($dados);
    exit();
}

$nome = $_POST["nome_estudante"];
$cpf = $_POST["cpf_estudante"];
$instituicao = $_POST["instituicao_estudante"];
$matricula = $_POST["matricula_estudante"];
$curso = $_POST["curso_estudante"];
$area = $_POST["area_estudante"];
$id_usuario = $_SESSION["id_usuario"];

//$nome = "João";
//$cpf = "98765432100";
//$instituicao ="senai";
//$matricula ="334";
//$curso ="designer";
//$area = "TI";

// Inserindo dados na tabela TB_ESTUDANTE
$stmt = $con->prepare("INSERT INTO TB_ESTUDANTE ( ID_USUARIO, NOME_ESTUDANTE, CPF_ESTUDANTE, INSTITUICAO_ESTUDANTE, MATRICULA_ESTUDANTE, CURSO_ESTUDANTE, AREA_ESTUDANTE) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssss", $id_usuario, $nome, $cpf, $instituicao, $matricula, $curso, $area);

if ($stmt->execute()) {
    $_SESSION['nome_estudante'] = $nomeUsuario;
    header('location: https://wise1nvest.000webhostapp.com/projeto/site/src/php/home.php')
} else {
    $dados = array("status" => "erro", "mensagem" => "Erro ao realizar consulta: " . $stmt->error);
}

// fechar banco
$stmt->close();
//$stmt_check->close(); teste para funcionamento  "?"
mysqli_close($con);

echo json_encode($dados);
?>
