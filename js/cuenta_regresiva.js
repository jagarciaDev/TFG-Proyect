function actualizarCuentaRegresiva(fechaConcierto, cuentaRegresivaId) {
    var fechaActual = new Date();
    var diff = fechaConcierto - fechaActual;
    var dias = Math.floor(diff / (1000 * 60 * 60 * 24));
    var horas = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutos = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    var segundos = Math.floor((diff % (1000 * 60)) / 1000);
    var cuentaRegresivaElemento = document.getElementById(cuentaRegresivaId);
    cuentaRegresivaElemento.textContent = '(' + dias + ' días ' + horas + ' horas ' + minutos + ' minutos ' + segundos + ' segundos)';
}