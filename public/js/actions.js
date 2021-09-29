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
            gravarEndereco(responseJson);
            setDadosExibicao(responseJson);
        })
        .catch(error => {
            console.log(error);
            exibirBoxErroCep('Ops! Seu cep não foi encontrado. Verifique o CEP ou tente novamente mais tarde.');
            document.getElementById('boxResponse').style.display = "none";
        });
        return 0;
    }

    setDadosExibicao(enderecoArmazenado);
}

function setDadosExibicao(responseJson) {
    if (responseJson.erro) {
        exibirBoxErroCep('Falha no carregamento do seu endereço, por favor tente novamente.');
        return false;
    }

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
        document.getElementById('boxResponse').style.display = "none";
        exibirBoxErroCep();
        return false;
    }
}

function gravarEndereco(responseJson) {
    const param = {
        method: "POST",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(responseJson)
    }

    fetch('/api', param)
    .then(response => response.json())
    .then(jsonResponse => jsonResponse)
    .catch(error => console.log(error));
}

function validarCep() {
    let regex = /^(\d{4,5})-?\s?(\d{3,4})$/;
    const cep = document.getElementById("buscarCep").value;

    return (!cep.length || !regex.test(cep)) ? false : cep.replace(regex, '$1$2');
}

function exibirBoxErroCep(message = '') {
    document.getElementById('boxResponse').style.display = "none";
    console.log('Mensagem: ' + message);
    message = message.length ? message : 'Erro ao tentar recuperar seu endereço. Por favor tente novamente.';
    preparaBoxExibicaoMensagem(message, 'alerta-sucesso', 'alerta-erro');
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

