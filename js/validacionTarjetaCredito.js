// Obtener los campos de la tarjeta de crédito
const cardNumberInput = document.getElementById('card_number');
const cardExpiryInput = document.getElementById('card_expiry');
const cardCvvInput = document.getElementById('card_cvv');
const comprarEntradasBtn = document.getElementById('comprarEntradasBtn');

// Habilitar o deshabilitar el botón de "Comprar entradas" según el estado de los campos de la tarjeta
function toggleComprarEntradasBtn() {
    const isCardNumberValid = validateCardNumber(cardNumberInput);
    const isCardExpiryValid = cardExpiryInput.value.trim() !== '';
    const isCardCvvValid = cardCvvInput.value.trim() !== '';

    comprarEntradasBtn.disabled = !(isCardNumberValid && isCardExpiryValid && isCardCvvValid);
}

// Validar que el campo "Número de tarjeta" solo contenga 16 dígitos numéricos
function validateCardNumber(input) {
    const cardNumber = input.value.trim();
    const isValid = /^\d{16}$/.test(cardNumber);

    input.setCustomValidity(
        isValid ? '' : 'El número de tarjeta debe contener exactamente 16 dígitos numéricos.'
    );

    return isValid;
}

// Escuchar los eventos de cambio en los campos de la tarjeta
cardNumberInput.addEventListener('input', toggleComprarEntradasBtn);
cardExpiryInput.addEventListener('input', toggleComprarEntradasBtn);
cardCvvInput.addEventListener('input', toggleComprarEntradasBtn);
