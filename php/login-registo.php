<?php
require_once __DIR__ . '/../conexao.php';
session_start();
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // LOGIN
    if (isset($_POST['login'])) {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $query = "SELECT id_pessoa, nome, password, admin FROM pessoa WHERE email = $1";
        $result = pg_query_params($conexao, $query, [$email]);
        $usuario = pg_fetch_assoc($result);

        if ($usuario && $password === $usuario['password']) {
            $_SESSION['usuario_id'] = $usuario['id_pessoa'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_admin'] = $usuario['admin'];
            if ($usuario['admin'] === 't' || $usuario['admin'] === true || $usuario['admin'] === 1) {
                header('Location: ../pages/dashboard.php');
            } else {
                header('Location: ../index.php');
            }
            exit();
        } else {
            $erro = "Email ou senha inválidos.";
        }
    }
    // REGISTO
    if (isset($_POST['registar'])) {
        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirmar_password = $_POST['confirmar_password'] ?? '';

        if (!$nome || !$email || !$password || !$confirmar_password) {
            $erro = "Por favor, preencha todos os campos.";
        } elseif ($password !== $confirmar_password) {
            $erro = "As passwords não coincidem.";
        } else {
            $query_check = "SELECT id_pessoa FROM pessoa WHERE email = $1";
            $result_check = pg_query_params($conexao, $query_check, [$email]);
            if (pg_num_rows($result_check) > 0) {
                $erro = "Já existe uma conta com este email.";
            } else {
                $query_insert = "INSERT INTO pessoa (nome, email, password, admin) VALUES ($1, $2, $3, false)";
                $result_insert = pg_query_params($conexao, $query_insert, [$nome, $email, $password]);
                if ($result_insert) {
                    $erro = "Registo efetuado com sucesso. Faça login!";
                } else {
                    $erro = "Erro ao cadastrar. Tente novamente.";
                }
            }
        }
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
    <link rel="stylesheet" href="../styles/login-registro/secao-registo-login.css">
    <link rel="stylesheet" href="../styles/login-registro/beneficios.css">
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
                <a class="cabecalho-login" href="#">Login/Registro</a>
                <!---Ancora serve para levar a outra pagina do próprio site.-->
            </div>
        </div>
    </header>
    <main>
        <section class="secao-formulario">
            <h2 id="form-titulo">Login</h2>
            <?php if (!empty($erro)) echo "<span style='color:red;'>$erro</span>"; ?>

            <!-- LOGIN -->
            <form id="login-form" class="s-f-formulario" method="POST" action="">
                <input type="email" name="email" placeholder="Endereço de Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <p>
                    <input type="checkbox" name="permitir" value="permitir">
                    Permite guardar a password?
                </p>
                <button type="submit" name="login">Login</button>
                <a href="#" id="mostrar-registo">Não tenho conta. Registar</a>
            </form>

            <!-- REGISTO (default escondido) -->
            <form id="registo-form" class="s-f-formulario" method="POST" action="" style="display:none;">
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="email" name="email" placeholder="Endereço de Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirmar_password" placeholder="Confirmar Password" required>
                <p>
                    <input type="checkbox" name="permitir" value="permitir" required>
                    Concordo com os Termos de Serviço e Políticas de Privacidade
                </p>
                <button type="submit" name="registar">Registar</button>
                <a href="#" id="mostrar-login">Já tenho conta. Login</a>
            </form>
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
    <script>
        document.getElementById('mostrar-registo').onclick = function(e) {
            e.preventDefault();
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('registo-form').style.display = 'flex';
            document.getElementById('form-titulo').textContent = 'Registo';
        };

        document.getElementById('mostrar-login').onclick = function(e) {
            e.preventDefault();
            document.getElementById('registo-form').style.display = 'none';
            document.getElementById('login-form').style.display = 'flex';
            document.getElementById('form-titulo').textContent = 'Login';
        };
    </script>

</body>
</html>