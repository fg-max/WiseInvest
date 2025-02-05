<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $loginx = $_POST["login"];
    $senhax = $_POST["senha"];

    //$loginx = "teste@gmail.com";
    //$senhax = "teste1234";

    $con = mysqli_connect("localhost", "id22131576_wise_invest", "caNNabis420.", "id22131576_wise_invest");

    if (!$con) {
        $dados = array("status" => "erro", "mensagem" => "Erro de conexão com o banco de dados");
    } else {
        // Usando prepared statement para evitar SQL Injection
        $stmt = $con->prepare("SELECT * FROM TB_USUARIO WHERE EMAIL_USUARIO=? AND SENHA_USUARIO=?");
        $stmt->bind_param("ss", $loginx, $senhax);
        $stmt->execute();
        $resulta = $stmt->get_result();

        if ($resulta->num_rows > 0) {
            $r = $resulta->fetch_assoc();
            $_SESSION['id_usuario'] = $r['ID_USUARIO'];

            // Verificar o tipo de usuário baseado no ID do usuário
            $id_usuario = $_SESSION['id_usuario'];

            // Verificar se é estudante
            $stmt_estudante = $con->prepare("SELECT NOME_ESTUDANTE FROM TB_ESTUDANTE WHERE ID_USUARIO=?");
            $stmt_estudante->bind_param("i", $id_usuario);
            $stmt_estudante->execute();
            $result_estudante = $stmt_estudante->get_result();

            if ($result_estudante->num_rows > 0) {
                $nomeUsuario = $result_estudante->fetch_assoc()['NOME_ESTUDANTE'];
                $_SESSION['nome_usuario'] = $nomeUsuario;
                 $stmt_estudante->close();
                 header("location: https://wise1nvest.000webhostapp.com/projeto/site/src/php/home.php");
                 exit(); // Importante: encerrar o script após o redirecionamento
            } else {
                // Verificar se é empreendedor
                $stmt_empreendedor = $con->prepare("SELECT NOME_EMPREENDEDOR FROM TB_EMPREENDEDOR WHERE ID_USUARIO=?");
                $stmt_empreendedor->bind_param("i", $id_usuario);
                $stmt_empreendedor->execute();
                $result_empreendedor = $stmt_empreendedor->get_result();

                if ($result_empreendedor->num_rows > 0) {
                    $nomeUsuario = $result_empreendedor->fetch_assoc()['NOME_EMPREENDEDOR'];
                    $_SESSION['nome_usuario'] = $nomeUsuario;
                    $stmt_empreendedor->close();
                    header("location: https://wise1nvest.000webhostapp.com/projeto/site/src/php/home.php");
                    exit(); // Importante: encerrar o script após o redirecionamento
                } else {
                    echo 'insira suas inforamções';
                }
            }
        } else {
            $dados = array("status" => "erro", "mensagem" => "Login ou senha incorretos");
        }

        $stmt->close();
        mysqli_close($con);
    }
} else {
    $dados = array("status" => "erro", "mensagem" => "Método de requisição inválido");
}

echo json_encode($dados);
?>
