<<<<<<< HEAD
<?php
//toda vez que eu precisar chamar todos os restaurantes uso esse arquivo, gerando um array associativo
// obs: array associativo: um array com array dentro. primeiro nome do restaurante e segundo seria os dados
require_once __DIR__ . '/../conexao.php';

 //inicia a conexao com a base de dados
$restaurantes = []; //crio um array para colocar os restaurantes

$sql = "SELECT * FROM restaurante";
$resultado = pg_query($conexao, $sql); //busco o que quero pegar da conexao. retorna cada restaurante em um array deformado

if ($resultado) {
   while($linha = pg_fetch_assoc($resultado)){ //while = coloca informacoes enquanto tem pra por no array
       $restaurantes[] = $linha; //array[] recebe= um $restaurante
   }
}



=======
<?php
//toda vez que eu precisar chamar todos os restaurantes uso esse arquivo, gerando um array associativo
// obs: array associativo: um array com array dentro. primeiro nome do restaurante e segundo seria os dados
require_once __DIR__ . '/../conexao.php';

 //inicia a conexao com a base de dados
$restaurantes = []; //crio um array para colocar os restaurantes

$sql = "SELECT * FROM restaurante";
$resultado = pg_query($conexao, $sql); //busco o que quero pegar da conexao. retorna cada restaurante em um array deformado

if ($resultado) {
   while($linha = pg_fetch_assoc($resultado)){ //while = coloca informacoes enquanto tem pra por no array
       $restaurantes[] = $linha; //array[] recebe= um $restaurante
   }
}



>>>>>>> 058331c73f5ed94323da428e2a316c8113a416ac
