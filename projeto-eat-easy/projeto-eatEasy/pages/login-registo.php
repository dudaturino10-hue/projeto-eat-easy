<<<<<<< HEAD
<?php
require_once __DIR__ . '/../conexao.php';

session_start();

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmar_password = $_POST['confirmar_password'] ?? '';

    if (!$nome || !$email || !$password || !$confirmar_password) {
        $erro = "Por favor, preencha todos os campos.";
    } elseif ($password !== $confirmar_password) {
        $erro = "As passwords não coincidem.";
    } else {
        // Verifica se o email já existe
        $query_check = "SELECT id_pessoa FROM pessoa WHERE email = $1";
        $result_check = pg_query_params($conexao, $query_check, array($email));

        if (pg_num_rows($result_check) > 0) {
            $erro = "Já existe uma conta com este email.";
        } else {
            // Insere o novo usuário com admin = false
            $query_insert = "INSERT INTO pessoa (nome, email, password, admin) VALUES ($1, $2, $3, false)";
            $result_insert = pg_query_params($conexao, $query_insert, array($nome, $email, $password));

            if ($result_insert) {
                // Registro OK, redireciona para login.php
                header('Location: ../pages/login.php');
                exit();
            } else {
                $erro = "Erro ao cadastrar. Tente novamente.";
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
    <link rel="stylesheet" href="../styles/login-registro/secao-registro.css">
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
        <h2>Registo</h2>
        <form class="s-f-formulario" method="POST" action="login-registo.php">
            <input type="text" name="nome" placeholder="Nome Completo" required>
            <input type="email" name="email" placeholder="Endereço de Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirmar_password" placeholder="Confirmar Password" required>
            <p><input type="checkbox" name="permitir" value="permitir"> Concordo com os Termos de Serviço e Políticas de Privacidade</p>
            <button type="submit" id="enviar">Enviar</button>
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
</body>

=======
<?php
require_once __DIR__ . '/../conexao.php';

session_start();

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmar_password = $_POST['confirmar_password'] ?? '';

    if (!$nome || !$email || !$password || !$confirmar_password) {
        $erro = "Por favor, preencha todos os campos.";
    } elseif ($password !== $confirmar_password) {
        $erro = "As passwords não coincidem.";
    } else {
        // Verifica se o email já existe
        $query_check = "SELECT id_pessoa FROM pessoa WHERE email = $1";
        $result_check = pg_query_params($conexao, $query_check, array($email));

        if (pg_num_rows($result_check) > 0) {
            $erro = "Já existe uma conta com este email.";
        } else {
            // Insere o novo usuário com admin = false
            $query_insert = "INSERT INTO pessoa (nome, email, password, admin) VALUES ($1, $2, $3, false)";
            $result_insert = pg_query_params($conexao, $query_insert, array($nome, $email, $password));

            if ($result_insert) {
                // Registro OK, redireciona para login.php
                header('Location: ../pages/login.php');
                exit();
            } else {
                $erro = "Erro ao cadastrar. Tente novamente.";
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
    <link rel="stylesheet" href="../styles/login-registro/secao-registro.css">
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
        <h2>Registo</h2>
        <form class="s-f-formulario" method="POST" action="login-registo.php">
            <input type="text" name="nome" placeholder="Nome Completo" required>
            <input type="email" name="email" placeholder="Endereço de Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirmar_password" placeholder="Confirmar Password" required>
            <p><input type="checkbox" name="permitir" value="permitir"> Concordo com os Termos de Serviço e Políticas de Privacidade</p>
            <button type="submit" id="enviar">Enviar</button>
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
</body>

>>>>>>> 058331c73f5ed94323da428e2a316c8113a416ac
</html>