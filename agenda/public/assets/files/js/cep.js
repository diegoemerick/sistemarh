/**
 * Recebe o cep via parâmetro,
 * Se retornar o cep correto, preenche os campos
 * caso não mostra a mensagem de cep não encontrado
 * @param cep
 */
function consultacep(cep) {
    cep = cep.replace(/\D/g, "");
    var url = "http://apps.widenet.com.br/busca-cep/api/cep/cep.json";

    $.get(url, {code: cep},
        function (result) {
            if (result.status != 1) {
                $.Notification.notify('warning','bottom right','Cep', result.message);
                return;
            }
            $.Notification.notify('custom','bottom right','Cep', 'Consultando Cep');
            $("input#logradouro").val(result.address);
            $("input#bairro").val(result.district);
            $("input#estado").val(result.state);
            $("input#cidade").val(result.city);
        });
}