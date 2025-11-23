<?php
//pega do banco de dados e mostra a informacao do restaurantes que o usuario selecionou na pagina inicial por meio do id

require_once __DIR__ . '/../conexao.php';

//esse id esta escrito na pg inicial (<a href="./pages/reserva-restaurante.php?id=<?= $restaurante['id_restaurante'])
//colocamos o id_restaurante em uma variavel ($id) e transformando em numero
//pega o id_restaurante e pergunta (?) se existe, se sim, tranforma em numero, se nao (:) , retorna 0
//funciona como um if else
// retorna o id em numero mesmo que nao seja numero (mas no caso já era)
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

//cria uma varial vazia para colocar o restaurante selecionado
$restauranteSelecionado = null;

if ($id > 0) {
    //cria uma variavel que se liga a conexao para fazer a seguinte pergunta a base de dados:
    $resultado = pg_query_params($conexao, "SELECT * FROM restaurante WHERE id_restaurante = $1", [$id]);
    if ($resultado) {
        $restauranteSelecionado = pg_fetch_assoc($resultado); //manda o resultado (restaurante) para a varial $restauranteSelecionado que agora é um array associativo que guarda: restaurante {dados do restaurante};
    }
}

