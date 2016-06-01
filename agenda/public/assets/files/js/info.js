/**
 * Recebe os parametros e quando é chamada
 * exibe um informativo na tela
 */
function msg(tipo, titulo, texto){
    $.Notification.notify(tipo,'bottom right',titulo, texto);
}
