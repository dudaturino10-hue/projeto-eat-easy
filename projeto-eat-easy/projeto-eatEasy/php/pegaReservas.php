<<<<<<< HEAD
<?php
//toda vez que eu precisar chamar todas as reservas uso esse arquivo, gerando um array associativo chamado reservas
// obs: array associativo: um array com array dentro.

require_once __DIR__ . '/../conexao.php';

$pessoaId = 1;

$sql = "
    SELECT
        r.id_reserva,
        r.data,
        r.hora,
        r.n_pessoas_,
        r.categoria,
        rest.nome AS restaurante_nome,
        rest.localizacao,
        rest.descricao AS restaurante_descricao,
        rest.nome AS restaurante_imagem
    FROM reserva r
    INNER JOIN restaurante rest
        ON rest.id_restaurante = r.restaurante_id_restaurante
    WHERE r.pessoa_id_pessoa = $pessoaId
    ORDER BY r.data DESC, r.hora DESC
";

$result = pg_query($conexao, $sql);

$reservas = [];
if ($result) {
    while ($row = pg_fetch_assoc($result)) {
        $reservas[] = $row;
    }
}

=======
<?php
//toda vez que eu precisar chamar todas as reservas uso esse arquivo, gerando um array associativo chamado reservas
// obs: array associativo: um array com array dentro.

require_once __DIR__ . '/../conexao.php';

$pessoaId = 1;

$sql = "
    SELECT
        r.id_reserva,
        r.data,
        r.hora,
        r.n_pessoas_,
        r.categoria,
        rest.nome AS restaurante_nome,
        rest.localizacao,
        rest.descricao AS restaurante_descricao,
        rest.nome AS restaurante_imagem
    FROM reserva r
    INNER JOIN restaurante rest
        ON rest.id_restaurante = r.restaurante_id_restaurante
    WHERE r.pessoa_id_pessoa = $pessoaId
    ORDER BY r.data DESC, r.hora DESC
";

$result = pg_query($conexao, $sql);

$reservas = [];
if ($result) {
    while ($row = pg_fetch_assoc($result)) {
        $reservas[] = $row;
    }
}

>>>>>>> 058331c73f5ed94323da428e2a316c8113a416ac
