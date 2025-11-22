// coloca uma mensagem de lista vazia quando nao tem reservas no banco de dados
const listaReservas = document.querySelector('.s-h-r-lista-reservas'); //vai ate a div ja existente no historico-reservas.php que tem a classe .s-h-r-lista-reservas

if (listaReservas.children.length === 0) { //se a div (listaReservas) for 0 coloca a manesagem
    const mensagemVazia = document.createElement('p'); //cria um paragrafo
    mensagemVazia.textContent = 'Nenhuma reserva encontrada.';// adiciona ao paragrafo a frase
    mensagemVazia.classList.add('s-h-r-lista-vazia'); //adiciona uma classe ao paragrafo que vai ser chamado no css para ser estilizado
    listaReservas.appendChild(mensagemVazia);  //coloca o paragrafo dentro da div
}

