<<<<<<< HEAD
<?php
require_once __DIR__ . '/../php/contagemReservas.php';
require_once __DIR__ . '/../php/pegaReservas.php';
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
    <link rel="stylesheet" href="../styles/stylesHistoricoReservas/secao-historico-reservas.css">
    <title>eatEasy Inc.</title>
</head>

<body>
    <header class="cabecalho">
        <div class="res">
            <a href="../index.php" class="cabecalho-logo"><img src="../img/img-logo/logoRedimensionado.png" alt="Logo eatEasy Inc."></a>
            <div class="cabecalho-opcoes">
                <a class="cabecalho-opcao" href="../index.php">Início</a>
                <a class="cabecalho-opcao" href="historico-reservas.php">Minhas Reservas</a>
                <a class="cabecalho-login" href="login-registo.php">Login/Registro</a>
                <!---Ancora serve para levar a outra pagina do próprio site.-->
            </div>
        </div>
    </header>
    <main>
        <section class="secao-historico-reservas">
            <h2 class="s-h-r-titulo">Histórico de Reservas</h2>
            <p class="s-h-r-paragrafo">Gerencie e visualize todas as suas reservas</p>
            <div class="s-h-r-estatisticas">
                <div class="s-h-r-estatisticas-item">
                    <span class="s-h-r-estatisticas-item-quantidade cor-cinza"><?= $totalReservas ?></span>
                    <span class="s-h-r-estatisticas-item-descricao">Total de reservas</span>
                </div>
                <div class="s-h-r-estatisticas-item">
                    <span class="s-h-r-estatisticas-item-quantidade cor-verde"><?= $contagem['AGENDADA'] ?></span>
                    <span class="s-h-r-estatisticas-item-descricao">Reservas agendadas</span>
                </div>
                <div class="s-h-r-estatisticas-item">
                    <span class="s-h-r-estatisticas-item-quantidade cor-amarela"><?= $contagem['REALIZADA'] ?></span>
                    <span class="s-h-r-estatisticas-item-descricao">Reservas concluidas</span>
                </div>
                <div class="s-h-r-estatisticas-item">
                    <span class="s-h-r-estatisticas-item-quantidade cor-vermelha"><?= $contagem['CANCELADA'] ?></span>
                    <span class="s-h-r-estatisticas-item-descricao">Reservas canceladas</span>
                </div>
            </div>

            <div class="s-h-r-filtros">
                <button class="s-h-r-filtros-item-selecionado">Todas (<?= $totalReservas ?>)</button>
                <button class="s-h-r-filtros-item">Agendadas (<?= $contagem['AGENDADA'] ?>)</button>
                <button class="s-h-r-filtros-item">Concluídas (<?= $contagem['REALIZADA'] ?>)</button>
                <button class="s-h-r-filtros-item">Canceladas (<?= $contagem['CANCELADA'] ?>)</button>
            </div>

            <div class="s-h-r-lista-reservas">
                <?php foreach ($reservas as $reserva): ?>
                    <div class="s-h-r-lista-reservas-item">
                        <img src="../img/img-destaques/<?= htmlspecialchars($reserva['restaurante_nome']); ?>.png" alt="<?= htmlspecialchars($reserva['restaurante_nome']); ?>">
                        <h3 class="s-h-r-lista-reservas-item-titulo"><?= htmlspecialchars($reserva['restaurante_nome']); ?></h3>
                        <span class="s-h-r-lista-reservas-item-data">Data: <?= htmlspecialchars($reserva['data']); ?></span>
                        <span class="s-h-r-lista-reservas-item-hora">Horário: <?= htmlspecialchars($reserva['hora']); ?>h</span>
                        <span class="s-h-r-lista-reservas-item-pessoas"><?= htmlspecialchars($reserva['n_pessoas_']); ?> pessoas</span>
                        <span class="s-h-r-lista-reservas-item-status status-<?= strtolower(htmlspecialchars($reserva['categoria'])); ?>"
                              data-status="<?= htmlspecialchars($reserva['categoria']); ?>">
                            <?= htmlspecialchars($reserva['categoria']); ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
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
<script src="../js/historicoReservaVazio.js"></script>
=======
<?php
require_once __DIR__ . '/../php/contagemReservas.php';
require_once __DIR__ . '/../php/pegaReservas.php';
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
    <link rel="stylesheet" href="../styles/stylesHistoricoReservas/secao-historico-reservas.css">
    <title>eatEasy Inc.</title>
</head>

<body>
    <header class="cabecalho">
        <div class="res">
            <a href="../index.php" class="cabecalho-logo"><img src="../img/img-logo/logoRedimensionado.png" alt="Logo eatEasy Inc."></a>
            <div class="cabecalho-opcoes">
                <a class="cabecalho-opcao" href="../index.php">Início</a>
                <a class="cabecalho-opcao" href="historico-reservas.php">Minhas Reservas</a>
                <a class="cabecalho-login" href="login-registo.php">Login/Registro</a>
                <!---Ancora serve para levar a outra pagina do próprio site.-->
            </div>
        </div>
    </header>
    <main>
        <section class="secao-historico-reservas">
            <h2 class="s-h-r-titulo">Histórico de Reservas</h2>
            <p class="s-h-r-paragrafo">Gerencie e visualize todas as suas reservas</p>
            <div class="s-h-r-estatisticas">
                <div class="s-h-r-estatisticas-item">
                    <span class="s-h-r-estatisticas-item-quantidade cor-cinza"><?= $totalReservas ?></span>
                    <span class="s-h-r-estatisticas-item-descricao">Total de reservas</span>
                </div>
                <div class="s-h-r-estatisticas-item">
                    <span class="s-h-r-estatisticas-item-quantidade cor-verde"><?= $contagem['AGENDADA'] ?></span>
                    <span class="s-h-r-estatisticas-item-descricao">Reservas agendadas</span>
                </div>
                <div class="s-h-r-estatisticas-item">
                    <span class="s-h-r-estatisticas-item-quantidade cor-amarela"><?= $contagem['REALIZADA'] ?></span>
                    <span class="s-h-r-estatisticas-item-descricao">Reservas concluidas</span>
                </div>
                <div class="s-h-r-estatisticas-item">
                    <span class="s-h-r-estatisticas-item-quantidade cor-vermelha"><?= $contagem['CANCELADA'] ?></span>
                    <span class="s-h-r-estatisticas-item-descricao">Reservas canceladas</span>
                </div>
            </div>

            <div class="s-h-r-filtros">
                <button class="s-h-r-filtros-item-selecionado">Todas (<?= $totalReservas ?>)</button>
                <button class="s-h-r-filtros-item">Agendadas (<?= $contagem['AGENDADA'] ?>)</button>
                <button class="s-h-r-filtros-item">Concluídas (<?= $contagem['REALIZADA'] ?>)</button>
                <button class="s-h-r-filtros-item">Canceladas (<?= $contagem['CANCELADA'] ?>)</button>
            </div>

            <div class="s-h-r-lista-reservas">
                <?php foreach ($reservas as $reserva): ?>
                    <div class="s-h-r-lista-reservas-item">
                        <img src="../img/img-destaques/<?= htmlspecialchars($reserva['restaurante_nome']); ?>.png" alt="<?= htmlspecialchars($reserva['restaurante_nome']); ?>">
                        <h3 class="s-h-r-lista-reservas-item-titulo"><?= htmlspecialchars($reserva['restaurante_nome']); ?></h3>
                        <span class="s-h-r-lista-reservas-item-data">Data: <?= htmlspecialchars($reserva['data']); ?></span>
                        <span class="s-h-r-lista-reservas-item-hora">Horário: <?= htmlspecialchars($reserva['hora']); ?>h</span>
                        <span class="s-h-r-lista-reservas-item-pessoas"><?= htmlspecialchars($reserva['n_pessoas_']); ?> pessoas</span>
                        <span class="s-h-r-lista-reservas-item-status status-<?= strtolower(htmlspecialchars($reserva['categoria'])); ?>"
                              data-status="<?= htmlspecialchars($reserva['categoria']); ?>">
                            <?= htmlspecialchars($reserva['categoria']); ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
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
<script src="../js/historicoReservaVazio.js"></script>
>>>>>>> 058331c73f5ed94323da428e2a316c8113a416ac
</html>