<?php

require_once __DIR__ . '/../conexao.php';

$restaurantesPesquisa = [];
$pesquisaFeita = isset($_GET['cidade']) || isset($_GET['restaurante']); // pega o nome do imput (pesquisa)

if ($pesquisaFeita) {
    $cidade = isset($_GET['cidade']) ? pg_escape_string($conexao, trim($_GET['cidade'])) : ''; //pega o que a pessoa escreveu e pergunta para a conexao com o bancos de dados se aquilo q foi pesquisado existe ou nao
    $restauranteNome = isset($_GET['restaurante']) ? pg_escape_string($conexao, trim($_GET['restaurante'])) : '';

    $sql = "SELECT * FROM restaurante WHERE 1=1";
    if ($cidade !== '') {
        $sql .= " AND localizacao ILIKE '%$cidade%'";
    }
    if ($restauranteNome !== '') {
        $sql .= " AND nome ILIKE '%$restauranteNome%'";
    }

    /*
     * ele faz isso:
     SELECT * FROM restaurante
     WHERE 1=1
     AND localizacao ILIKE '%o que a pessoa escreveu na cidade%'
     AND nome ILIKE '%o que a pessoa escreveu no nome%'
     */

    if ($cidade !== '' || $restauranteNome !== '') {
        $resultado = pg_query($conexao, $sql); //busco o que quero pegar da conexao. retorna cada restaurante com base na pesquisa em um array deformado

        if ($resultado) {
            while($linha = pg_fetch_assoc($resultado)){ //while = coloca informacoes enquanto tem pra por no array
                $restaurantesPesquisa[] = $linha; //array[] recebe= um $restaurante
            }
        }
    } else {
        $restaurantesPesquisa = [];
    }
}