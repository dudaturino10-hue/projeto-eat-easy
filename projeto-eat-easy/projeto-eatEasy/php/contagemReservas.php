<?php
require_once __DIR__ . '/../conexao.php';
//busca do bando de dados a contagem de cada categoria da reserva

$pessoaId = 1;

// cria um array associativo (onde cada chave tem um valor: o valor é inicialmente 0 (vazio), pois sera substituido pelos valores reais)
$contagem = [
    'AGENDADA' => 0,
    'REALIZADA' => 0,
    'CANCELADA' => 0
];

// Busca na base de dados as reservas de um deerminado cliente, faz o calculo total de todas as categorias da reserva e no fim agrupa por categoria
$sql = "SELECT categoria, COUNT(*) AS total 
        FROM reserva 
        WHERE pessoa_id_pessoa = $pessoaId
        GROUP BY categoria";

$result = pg_query($conexao, $sql); //busco o que quero pegar da conexao. retorna a contagem de cada categoria das reservas reais de um determinado cliente em um array deformado

if ($result) {
    while ($linha = pg_fetch_assoc($result)) { //while = coloca informacoes enquanto tem pra por no array e transforma o resultado (contagem de cada categoria das reservas reais de um determinado cliente) em um array associativo
        $categoriaMaiuscula = strtoupper($linha['categoria']); // strtoupper: transfroma a string em letras maiusculas
        if (isset($contagem[$categoriaMaiuscula])) { //pega a variavel $categoriaMaiuscula que contem a chave categorias anteriormente transformadas em maiusculo recebida da base de dados e verifica se é o mesmo nome da chave do array criado inicialmente com os resultados vazios.
            $contagem[$categoriaMaiuscula] = (int)$linha['total']; // Atualiza a contagem da categoria com o total obtido da consulta
            /*
            $row1 = ['categoria' => 'agendada', 'total' => '5'];
            $row2 = ['categoria' => 'realizada', 'total' => '2'];
             */
        }
    }
}

// Total geral
$totalReservas = array_sum($contagem); //soma o total de todas as categorias
