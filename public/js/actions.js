async function buscarCep(event) {
    event.preventDefault();
    const cep = validarCep();

    if (!cep) {
        exibirBoxErroCep();
        return;
    }

    let enderecoArmazenado = await buscarInternamente(cep)
                                    .then((response) => response.data);

    if (!enderecoArmazenado) {
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => response.json())
        .then(responseJson => {
            // GRAVAR NOVO REGISTRO
            setDadosExibicao(responseJson);
        })
        .catch(error => {
            console.log(error);
            exibirBoxErroCep();
            document.getElementById('boxResponse').style.display = "none";
        });

        return 0
    }

    setDadosExibicao(enderecoArmazenado);
}

function setDadosExibicao(responseJson) {
    document.getElementById('municipio').value   = responseJson.localidade;
    document.getElementById('bairro').value      = responseJson.bairro;
    document.getElementById('endereco').value    = responseJson.logradouro;
    document.getElementById('uf').value          = responseJson.uf;
    document.getElementById('cep').value         = responseJson.cep;
    document.getElementById('boxResponse').style.display = "block";
    exibirBoxSucessoCep();
}


async function buscarInternamente(cep) {
    try {
        const response = await fetch(`/api/${cep}`);
        const data     = await response.json()
        return data;
    } catch (err) {
        return false;
    }
}

function gravarEndereco(responseJson) {
    fetch(`/api`, {method: 'POST', body: responseJson})
    .then(response => response.json())
    .then(jsonResponse => console.log(jsonResponse))
    .catch(error => console.log(error));
}

function validarCep() {
    let regex = /^(\d{4})-?(\d{4})$/;
    const cep = document.getElementById("buscarCep").value;

    if (!cep.length || !regex.test(cep)) return false;

    return cep.replace(regex, '$1$2');
}

function exibirBoxErroCep() {
    document.getElementById('boxResponse').style.display = "none";
    preparaBoxExibicaoMensagem('Erro ao tentar recuperar seu endereço. Por favor tente novamente.', 'alerta-sucesso', 'alerta-erro');
}

function exibirBoxSucessoCep() {
    preparaBoxExibicaoMensagem('Busca realizada com sucesso, confira o endereço solicitado abaixo.', 'alerta-erro', 'alerta-sucesso')
}

function preparaBoxExibicaoMensagem(mensagem, remove, add) {
    const boxMensagem = document.getElementById("boxMessage");
    const alertBox    = document.getElementById("alertMessage");
    const textMensage = document.getElementById("insertTextResponse");
    boxMensagem.style.display  = "block";
    textMensage.textContent    = mensagem;
    alertBox.classList.remove(remove);
    alertBox.classList.add(add);

    setTimeout(() => {
        boxMensagem.style.display  = "none";
    }, 5000);
}

const btnConsultar = document.getElementById('btnProcurar');
btnConsultar.addEventListener('click', buscarCep);

