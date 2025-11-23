<?php
require_once __DIR__ . '/../php/infoRestaurante.php';
require_once __DIR__ . '/../conexao.php';

// Pega o id do restaurante pela URL se existir, converte para inteiro, caso contrário, define como 0
$restauranteId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {// Pega os dados do formulário, usando valores padrão caso não existam
    //diz q vamos trabalhar com post. o post é usado para mandar dados do cliente ao servidor
    $data = $_POST['reservaData'] ?? null; //reservaData é o name do input
    $hora = $_POST['reservaHora'] ?? null;
    $nPessoas = isset($_POST['reservaPessoas']) ? (int)$_POST['reservaPessoas'] : 0;
    $categoria = $_POST['reservaConfirmacao'] ?? 'agendada'; //input escondido, que envia a categoria agendada assim que faz uma reserva
    $pessoaId = 1;

    $sql = "INSERT INTO reserva (data, hora, n_pessoas_, categoria, restaurante_id_restaurante, pessoa_id_pessoa) 
                VALUES ($1, $2, $3, $4, $5, $6)"; // prepara para enviar cada um para as suas respectivas colunas

    $result = pg_query_params($conexao, $sql, [$data, $hora, $nPessoas, $categoria, $restauranteId, $pessoaId]); //substitui as variaveis $1, $2,... pelas variaveis recebidas e envia para o banco de dados
}
