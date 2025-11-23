<?php
require_once __DIR__ . '/../php/infoRestaurante.php';
require_once __DIR__ . "/../php/salvarReserva.php";
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
    <link rel="stylesheet" href="../styles/stylesReservas/secao-infor_restaurante.css">
    <link rel="stylesheet" href="../styles/stylesReservas/styles-agenda-reserva.css">
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
                <a class="cabecalho-login" href="login-registo.php">Login/Registro</a>
                <!---Ancora serve para levar a outra pagina do próprio site.-->
            </div>
        </div>
    </header>
    <main>
        <!-- nao faz foreach pq so tem um restaurante por vez. Pega o array da pg infoRestaurante-->
        <section class="secao-info-reserva">
            <img class="s-i-r-img" src="../img/img-destaques/<?= htmlspecialchars($restauranteSelecionado['nome']); ?>.png" alt="<?= htmlspecialchars($restauranteSelecionado['nome']); ?>">
            <div class="s-i-r-conteudo">
                <h2 class="s-i-r-titulo"><?= htmlspecialchars($restauranteSelecionado['nome']); ?></h2>
                <span class="s-i-r-nacionalidade">Português</span>
                <p class="s-i-r-paragrafo"><?= htmlspecialchars($restauranteSelecionado['descricao']); ?></p>
                <div class="s-i-r-dados">
                    <span class="s-i-r-endereco"><img src="../img/img-info-restaurante/localizacao.png" alt=""><?= htmlspecialchars($restauranteSelecionado['localizacao']); ?></span>
                    <span class="s-i-r-numero"><img src="../img/img-info-restaurante/telefone.png" alt=""><?= htmlspecialchars($restauranteSelecionado['contacto']); ?></span>
                    <span class="s-i-r-hora"><img src="../img/img-info-restaurante/relogio.png" alt=""><?= htmlspecialchars($restauranteSelecionado['horario_funcionamento']); ?></span>
                    <span class="s-i-r-preco"><img src="../img/img-info-restaurante/euro.png" alt="">Preço médio: €€</span>
                </div>
            </div>
        </section>
        <section class="secao-agenda-reserva">
            <div class="res">
                <h2 class="s-a-reserva-titulo">Faça a sua Reserva</h2>
                <form class="s-a-reserva-form" method="POST" action=""> <!--pega para postar no servidor -->
                    <div class="s-r-form-inputs">
                        <div>
                            <label for="reservaData">Data</label>
                            <input type="date" name="reservaData" id="reservaData" required>
                        </div>
                        <div>
                            <label for="reservaHora">Hora</label>
                            <input type="time" name="reservaHora" id="reservaHora" required>
                        </div>
                        <div>
                            <label for="reservaPessoas">Número de pessoas</label>
                            <input type="number" name="reservaPessoas" id="reservaPessoas" required>
                        </div>

                        <input type="hidden" name="reservaConfirmacao" value="agendada"> <!--input escondido, que envia a categoria agendada assim que faz uma reserva -->
                    </div>

                    <div class="s-r-form-confirmação">
                        <button type="submit">Confirmar reserva</button>
                        <span>Receberá um email de confirmação após concluir a reserva.</span>
                    </div>
                </form>

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
<script src="../js/reservaConfirmada.js"></script>
</html>