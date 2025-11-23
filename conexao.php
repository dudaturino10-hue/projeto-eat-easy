<?php
$str = "dbname=postgres user=postgres password=postgres host=localhost port=5432";
$conexao = pg_connect($str);

if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . pg_last_error());
}