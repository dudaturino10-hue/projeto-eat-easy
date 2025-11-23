<?php
require_once __DIR__ . '/php/pegaRestaurantes.php';
require_once __DIR__ . '/php/filtroRestaurante.php';
?>

<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="./styles/headerAndFooter/header.css">
    <link rel="stylesheet" href="./styles/stylesIndex/secao-busca.css">
    <link rel="stylesheet" href="./styles/stylesIndex/secao-destaques.css">
    <link rel="stylesheet" href="./styles/stylesIndex/secao-escolhas.css">
    <link rel="stylesheet" href="./styles/stylesIndex/secao-funcionamento.css">
    <link rel="stylesheet" href="./styles/headerAndFooter/rodape.css">
    <title>eatEasy Inc.</title>
</head>

<body class="body-index">
<header class="cabecalho">
    <div class="res">
        <a href="index.php" class="cabecalho-logo"><img src="./img/img-logo/logoRedimensionado.png" alt="Logo eatEasy Inc."></a>
        <div class="cabecalho-opcoes">
            <a class="cabecalho-opcao" href="index.php">Início</a>
            <a class="cabecalho-opcao" href="./pages/historico-reservas.php">Minhas Reservas</a>
            <a class="cabecalho-login" href="./pages/login-registo.php">Login/Registro</a>
            <!---Ancora serve para levar a outra pagina do próprio site.-->
        </div>
    </div>
</header>
<main>
    <section class="secao-busca">
        <h1 class="s-b-titulo">Reserve a sua mesa</h1>
        <p class="s-b-paragrafo">Descubra e reserve os melhores restaurante de Portugal</p>
        <form class="s-b-inputs" method="get"> <!-- mudei para form pois quando se trata de enviar dados se usa form. method="get" dessa forma pegamos o q o usuario escreveu para depois consultar na base de dados  -->
            <input class="s-b-inputs-cidade" type="text" name="cidade" placeholder="Cidade">
            <input class="s-b-inputs-restaurante" type="text" name="restaurante" placeholder="Cozinha, nome do restaurante...">
            <button class="s-b-inputs-pesquisar" type="submit">Pesquisar</button> <!-- type="submit" dessa forma envia o que a pessoa escreveu -->
        </form>
    </section>

    <!-- Mostra os resultados da pesquisa -->
    <?php if ($pesquisaFeita): ?>
        <section class="secao-resultados">
            <div class="res">
                <h2 class="s-d-titulo">Resultados da pesquisa</h2>
                <div class="s-d-destaques">
                    <?php if (!empty($restaurantesPesquisa)): ?> <!-- se o array que é colocado os resultados da pesquisa, nao estiver vazio, aparece o seguinte codigo -->
                        <?php foreach ($restaurantesPesquisa as $restaurante): ?> <!-- cada coisa do array se chama restaurante. chama quantos restaurantes estiverem de acordo com a pesquisa com o mesmo codigo html -->
                            <div class="s-d-destaques-item">
                                <a href="./pages/reserva-restaurante.php?id=<?= $restaurante['id_restaurante']; ?>" class="s-d-destaques-item"> <!-- envia o id_restaurante para a URL (esse id vai ser usado na infoRestaurante.php para saber qual restaurante foi clicado e qual info aparecer-->
                                    <img src="./img/img-destaques/<?= htmlspecialchars($restaurante['nome']) ?>.png" alt="<?= htmlspecialchars($r['nome']) ?>">
                                    <h3><?= htmlspecialchars($restaurante['nome']) ?></h3>
                                    <span><?= htmlspecialchars($restaurante['localizacao']) ?></span>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Nenhum restaurante encontrado.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="secao-destaques">
        <div class="res">
            <h2 class="s-d-titulo">Restaurantes em destaque</h2>
            <div class="s-d-destaques">
                <?php foreach ($restaurantes as $restaurante): ?>
                    <a href="./pages/reserva-restaurante.php?id=<?= $restaurante['id_restaurante']; ?>" class="s-d-destaques-item">
                        <img src="./img/img-destaques/<?= htmlspecialchars($restaurante['nome']); ?>.png" alt="<?= htmlspecialchars($restaurante['nome']); ?>">
                        <h3><?= htmlspecialchars($restaurante['nome']); ?></h3>
                        <span><?= htmlspecialchars($restaurante['localizacao']); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="secao-escolhas">
        <div class="res">
            <h2 class="s-e-titulo">Escolha seu prato</h2>
            <div class="s-e-escolhas">
                <div class="s-e-escolhas-escolha">
                    <img src="./img/img-escolhas/portugues.png" alt="">
                    <h3>Português</h3>
                </div>
                <div class="s-e-escolhas-escolha">
                    <img src="./img/img-escolhas/asiatico.png" alt="">
                    <h3>Asiático</h3>
                </div>
                <div class="s-e-escolhas-escolha">
                    <img src="./img/img-escolhas/italiano.png" alt="">
                    <h3>Italiano</h3>
                </div>
                <div class="s-e-escolhas-escolha">
                    <img src="./img/img-escolhas/japones.png" alt="">
                    <h3>Japonês</h3>
                </div>
                <div class="s-e-escolhas-escolha">
                    <img src="./img/img-escolhas/pizzaria.png" alt="">
                    <h3>Pizzaria</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="secao-funcionamento">
        <h2 class="s-f-titulo">Como funciona?</h2>
        <div class="s-f-funcionamentos">
            <div class="s-f-funcionamentos-funcionamento">
                <img src="./img/img-como_funciona/icon1.png" alt="">
                <h3>Vantagens exclusivas</h3>
                <p>O nosso programa de fidelização oferece promoções para diversos restaurantes e muitas outras
                    vantagens.</p>
            </div>
            <div class="s-f-funcionamentos-funcionamento">
                <img src="./img/img-como_funciona/icon2.png" alt="">
                <h3>A melhor escolha</h3>
                <p>Encontre o restaurante perfeito para cada ocasião.</p>
            </div>
            <div class="s-f-funcionamentos-funcionamento">
                <img src="./img/img-como_funciona/icon3.png" alt="">
                <h3>Reserva fácil</h3>
                <p>Reserva online, gratuita e com confirmação imediata, onde quer que esteja e a qualquer hora.
                </p>
            </div>
    </section>
</main>
<footer class="rodape">
    <div class="res">
        <a href="index.php" class="rodape-logo"><img src="./img/img-logo/logoRedimensionado.png" alt="Logo eatEasy Inc."></a>
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
            <img src="img/img-rodape/insta.png" alt="Instagram">
            <img src="img/img-rodape/face.png" alt="Facebook">
        </div>
    </div>
</footer>
</body>

</html>