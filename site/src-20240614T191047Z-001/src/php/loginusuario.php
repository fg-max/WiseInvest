<?php
$loginx = $_POST["login"];
$senhax = $_POST["senha"];

//$loginx="teste@gmail.com";
//$senhax="teste1234";

$con = mysqli_connect("localhost", "id22131576_wise_invest", "caNNabis420.", "id22131576_wise_invest");

if (!$con) {
    // Verifica se houve falha na conexão
    $dados = array("status" => "erro", "message" => "Erro de conexão com o banco de dados");
} else {
    $comando = "SELECT * FROM TB_USUARIO WHERE EMAIL_USUARIO='$loginx' AND SENHA_USUARIO='$senhax'";
    $resulta = mysqli_query($con, $comando);

    if (!$resulta) {
        // Verifica se houve falha na execução da consulta
        $dados = array("status" => "erro", "message" => "Erro na execução da consulta");
    } else {
        $dados = array("status" => "login incorreto"); // Valor padrão se não encontrar o usuário
        while ($r = mysqli_fetch_array($resulta)) {
            $dados = array("status" => "ok", "login" => $r[1], "senha" => $r[2]);
            header("location: https://wise1nvest.000webhostapp.com/projeto/site/src/pages/home.html");
        }
    }
    mysqli_close($con);
}

echo json_encode($dados);
?>
