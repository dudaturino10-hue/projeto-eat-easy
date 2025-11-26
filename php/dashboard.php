<?php
session_start();
if (!isset($_SESSION['usuario_nome'])) {
    header("Location: ./login-registo.php"); // ou caminho para tua página de login
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eatEasy Inc. Dashboard</title>

    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../styles/stylesboard/dashboard.css">

</head>
<body>
<div class="container">
    <aside class="sidebar">
        <div class="logo">
            <a href="../index.php" class="cabecalho-logo"><img src="../img/img-logo/logoRedimensionado.png" alt="Logo eatEasy"></a>
        </div>

        <nav class="menu">
            <ul>
                <li class="active"><img src="../img/img-menu-admin/casa.png" alt="Dashboard" /> Dashboard</li>
                <li><img src="../img/img-menu-admin/restaurantes.png" alt="Restaurantes" /> Restaurantes</li>
                <li><img src="../img/img-menu-admin/reservas.png" alt="Reservas" /> Reservas</li>
            </ul>
        </nav>
    </aside>

    <main class="main">
        <header class="header">
            <input type="text" placeholder="Search">
            <?php if (isset($_SESSION['usuario_nome'])): ?>
                <button class="botao">
                    Olá, <?= htmlspecialchars($_SESSION['usuario_nome']); ?>
                </button>
                <a class="botao" href="./logout.php">Logout</a>
            <?php else: ?>
                <a class="botao" href="./login-registo.php">Login/Registo</a>
            <?php endif; ?>
        </header>

        <section class="dashboard">
            <h2>Administração</h2>
            <button class="add-btn">Adicionar Restaurante</button>

            <table class="table restaurantes">
                <thead> <!--- Serve para agrupar as linhas do cabeçalho da tabela -->
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Local</th>
                    <th>Tipo</th>
                    <th>Preço</th>
                    <th>Contacto</th>
                    <th></th>
                </tr>
                </thead>
                <tbody> <!-- Serve para agrupar as linhas de dados principais da tabela -->
                <tr>
                    <td>Pasta Nova</td>
                    <td>Restaurante italiano especializado...</td>
                    <td>Lisboa</td>
                    <td>Italiana</td>
                    <td>€€€</td>
                    <td>218 765 432</td>
                    <td><button class="edit">Editar</button> <button class="remove">Remover</button></td>
                </tr>
                <tr>
                    <td>SushiGo</td>
                    <td>Espaço moderno com sushi...</td>
                    <td>Porto</td>
                    <td>Japonesa</td>
                    <td>€€</td>
                    <td>927 334 118</td>
                    <td><button class="edit">Editar</button> <button class="remove">Remover</button></td>
                </tr>
                <tr>
                    <td>CantinhoMar</td>
                    <td>Restaurante típico à beira-mar...</td>
                    <td>Faro</td>
                    <td>Peixe</td>
                    <td>€</td>
                    <td>915 882 406</td>
                    <td><button class="edit">Editar</button> <button class="remove">Remover</button></td>
                </tr>
                </tbody>
            </table>
        </section>

        <section class="reservas">
            <h2>Reservas</h2>

            <table class="table reservas-table">

                <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Restaurante</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Nº Pessoas</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Maria Silva</td>
                    <td>Pasta Nova</td>
                    <td>21/10</td>
                    <td>19h</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>Tiago Costa</td>
                    <td>SushiGo</td>
                    <td>22/10</td>
                    <td>20h</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>Duda Lopes</td>
                    <td>CantinhoMar</td>
                    <td>24/10</td>
                    <td>13h</td>
                    <td>3</td>
                </tr>
                </tbody>
            </table>
        </section>
    </main>
</div>
</body>
</html>