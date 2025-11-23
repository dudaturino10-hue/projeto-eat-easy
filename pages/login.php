<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../conexao.php';

function redirecionarLogin() {
    session_start();
    // if (isset($_SESSION['usuario_id'])) {
    //     header('Location: ../pages/dashboard.php');
    //     exit();
    // }
}

redirecionarLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT id_pessoa, nome, password, admin FROM pessoa WHERE email = $1";
    $result = pg_query_params($conexao, $query, array($email));
    $usuario = pg_fetch_assoc($result);

    if ($usuario && $password === $usuario['password']) {
        session_start();
        $_SESSION['usuario_id'] = $usuario['id_pessoa'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_admin'] = $usuario['admin'];
        // Redireciona conforme o valor de admin (true: dashboard, false: index)
        if ($usuario['admin'] === 't' || $usuario['admin'] === true || $usuario['admin'] === 1) {
            header('Location: ../pages/dashboard.php');
        } else {
            header('Location: ../index.php'); // index para utilizador comum
        }
        exit();
    } else {
        $erro = "Email ou senha inválidos.";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../styles/headerAndFooter/header.css">
    <link rel="stylesheet" href="../styles/headerAndFooter/rodape.css">
    <link rel="stylesheet" href="../styles/login-registro/secao-registro.css">
    <link rel="stylesheet" href="../styles/login-registro/beneficios.css">
    <link rel="stylesheet" href="../styles/login-registro/secao-login.css">
    <title>eatEasy Inc.</title>
</head>

<body>
<header class="cabecalho">
    <div class="res">
        <a href="../index.php" class="cabecalho-logo"><img src="../img/img-logo/logoRedimensionado.png"
                                                           alt="Logo eatEasy Inc."></a>
        <div class="cabecalho-opcoes">
            <a class="cabecalho-opcao" href="../index.php">Início</a>
            <a class="cabecalho-opcao" href="historico-reservas.php">Minhas Reservas</a>
            <a class="cabecalho-login" href="#">Login/Registo</a>
            <!---Ancora serve para levar a outra pagina do próprio site.-->
        </div>
    </div>
</header>
<main>
    <section class="secao-formulario">
        <h2>Login</h2>
        <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
        <form class="s-f-formulario" method="POST" action="">
            <input type="email" name="email" placeholder="Endereço de Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <p><input type="checkbox" name="permitir" value="permitir">Permite guardar a password?</p>
            <button type="submit">Login</button>
        </form>
        <a href="login-registo.php" id="login-registo"> Não tenho conta. Registar </a>

    </section>
    <section class="secao-beneficios">
        <div class="s-b-funcionamentos">
            <div>
                <img src="../img/img-beneficios/ok.png" alt="ok">
                <p>Reservas rápidas e fáceis</p>
            </div>
            <div>
                <img src="../img/img-beneficios/ok.png" alt="ok">
                <p>Histórico de reservas</p>
            </div>
            <div>
                <img src="../img/img-beneficios/ok.png" alt="ok">
                <p>Ofertas e promoções exclusivas</p>
            </div>
        </div>
    </section>
</main>
<footer class="rodape">
    <div class="res">
        <a href="../index.php" class="rodape-logo"><img src="../img/img-logo/logoRedimensionado.png" alt="Logo eatEasy Inc."></a>
        <div class="rodape-informacoes">
            <div class="rodape-i-contatos">
                <span class="r-i-contatos-telefone">+351 913824004</span>
                <span class="r-i-contatos-email">eatEasyInc@gmail.com</span>
                <span class="r-i-contatos-endereco">Edifício branco, Coimbra - Portugal</span>
            </div>
            <div class="rodape-i-termos">
                <a href="rodape-i-termos-servicos">Termos de Serviço</a>
                <a href="rodape-i-termos-privacidade">Política de Privacidade</a>
            </div>
        </div>
        <div class="rodape-redes-sociais">
            <img src="../img/img-rodape/insta.png" alt="Instagram">
            <img src="../img/img-rodape/face.png" alt="Facebook">
        </div>
    </div>
</footer>
</body>

</html>