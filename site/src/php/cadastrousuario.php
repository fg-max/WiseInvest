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
$senhaConfirma=$_POST["senhaconfirma"];
$tipoUsuario = $_POST["tipoCadastro"];
$status = "ATIVO";

    if ($senha === $senhaConfirma){
      try {
        $comando= "Insert into TB_USUARIO (EMAIL_USUARIO, SENHA_USUARIO, STATUS_USUARIO) values
        ('$email','$senha','$status')";
        $resulta = mysqli_query($con,$comando);

        if ($resulta) {
        $id_usuario = mysqli_insert_id($con);
        session_start();

        $_SESSION['id_usuario'] = $id_usuario;
      
        if ($tipoUsuario === 'estudante') {
          $id_usuario = mysqli_insert_id($con); //obtendo cahve primaria criada com auto increment
          header("location: https://wise1nvest.000webhostapp.com/projeto/site/src/pages/cadastroestudante.html");
        }
        elseif ($tipoUsuario === 'empreendedor') {
          $id_usuario = mysqli_insert_id($con); //obtendo cahve primaria criada com auto increment
          header("location: https://wise1nvest.000webhostapp.com/projeto/site/src/pages/cadastroempreendedor.html");
        }
        }
        else {   
          $dados=array("status"=>"erro");
        }
      }
      catch (Exception $e) {
        echo ("erro" . $e->intl_get_error_message())
      }
    }
    else {
      echo ("<script>alert('Senhas não confirmam.')</script>")
    }
$close = mysqli_close($con);
?>