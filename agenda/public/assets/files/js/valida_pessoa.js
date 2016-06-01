/**
 * Created by diego on 21/04/16.
 */
/**
 * Submete o formulário
 */
function enviarFormulario()
{
    document.forms["form.pessoa"].submit();
}

/**
 * Verifica o tipo da pessoa (fisica ou juridica)
 * e exibe os campos de acordo.
 */
function tipoPessoa(tipo)
{
    var pf = document.getElementById('div.pf');
    var pj = document.getElementById('div.pj');
console.log(tipo);
    if (tipo == "PF")
    {
        pf.style.display = "block";
        pj.style.display = "none";
    }
    else if (tipo == "PJ")
    {
        pf.style.display = "none";
        pj.style.display = "block";
    }
    else
    {
        pf.style.display = "none";
        pj.style.display = "none";
    }
}

/**
 * Adiciona os telefones ao campo
 * @type {Array}
 */
var tel_adicionados = [];
var operadora_adicionado = [];
/**
 * Pega os dados informados nos campos numero e operadora
 * adiciona uma linha com os dados na tabela que irá conter os numeros
 * adiciona os valores do vetor ao campo telefone
 */
function addTelefone(selOperadora) {

    // Dados informados
    var numero = document.getElementById('add_telefone');

    // Vetor
    var telefone = document.getElementById('telefone');
    var operadora = document.getElementById('operadora');

    // Tabela
    var tabela_telefone = document.getElementById('tabela.telefone');
    var tabela_conteudo = document.getElementById('tabela.conteudo');
    var linha_tabela = document.createElement('tr');
    var dado_tabela_operadora = document.createElement('td');
    var dado_tabela_numero = document.createElement('td');

    if (numero.value != "")
    {
        dado_tabela_operadora.textContent = selOperadora.value;
        dado_tabela_numero.textContent = numero.value;
        tabela_telefone.style.display = "block";
        tabela_conteudo.appendChild(linha_tabela);
        linha_tabela.appendChild(dado_tabela_operadora);
        linha_tabela.appendChild(dado_tabela_numero);

        tel_adicionados.push(numero.value);
        operadora_adicionado.push(selOperadora.value);
        telefone.value = tel_adicionados;
        operadora.value = operadora_adicionado;

        numero.value = "";
        numero.focus();
        selOperadora.selectedIndex = "Operadora";
    }
    else if(selOperadora.value == ""){
        msg("custom", "Operadora", "Necessário informar uma operadora");
    }
    else
    {
        msg("custom", "Telefone", "Necessário informar um número");
    }
}