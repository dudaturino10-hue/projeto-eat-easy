const formReserva = document.querySelector('.s-a-reserva-form');
const DivConfirmado = document.querySelector('.s-a-reserva-titulo');

formReserva.addEventListener('submit', function(event) {
    event.preventDefault(); //nao deixa recarregar a pagina apos o submit
    formReserva.innerHTML = ''; // esvazia o formulario.
    DivConfirmado.innerHTML = 'Reserva Confirmada!'; // insere um escrita de confirmacao
    DivConfirmado.style.color = 'var(--color-green)';
});