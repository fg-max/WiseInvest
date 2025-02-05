<?php
session_start();
if (isset($_SESSION['nome_usuario'])) {
    $nomeUsuario = $_SESSION['nome_usuario'];
} else {
    $nomeUsuario = "Nome de Usuário"; // Valor padrão caso não haja nome de usuário na sessão
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WiseInvest</title>
    <link rel="icon" href="../img/favicon.png" type="image/png">
    <link rel="stylesheet" href="../style/js/style.css">
    <link rel="stylesheet" href="../style/js/styled-components.css">
</head>
<body>
    <section class="sidebar">
        <img src="../img/favicon.png" alt="">
        <div class="menu-items">
            <ul>
                <li id="btnHome"><i class="fi fi-rr-apps"></i><p>Home</p></li>
                <li id="btnConta"><i class="fi fi-rs-user"></i><p>Conta</p></li>
                <li id="btnChat"><i class="fi fi-rr-comment"></i><p>Chat</p></li>
                <li id="btnConfig"><i class="fi fi-rr-settings"></i><p>Configurações</p></li>
            </ul>
        </div>
    </section>
    <header class="home-header">
        <h1>Boa danilo</h1>
        <div class="user-info">
            <img src="../img/jo_almeida.jpg" alt="">
            <h5>Bem vindo, <?php echo htmlspecialchars($nomeUsuario)?></h5>
        </div>
    </header>
    <main class="main-home">
        <h1>Boa</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo accusantium ipsa facere ullam quos eligendi, veritatis natus, molestias reprehenderit iure ipsum mollitia dignissimos laboriosam aliquid praesentium adipisci aperiam quia illum.</p>
    </main>
    <script src="../style/js/script.js"></script>
</body>
</html>