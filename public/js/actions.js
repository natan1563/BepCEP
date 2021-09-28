function buscarCep(event) {
    event.preventDefault();

    const cep = document.getElementById("buscarCep").value;

    if (!cep.length) return false;

    fetch(`https://viacep.com.br/ws/${cep}/json/`)
    .then(response => response.json())
    .then(responseJson => {
        enderecoCompleto.innerHTML  = `<li class="">Municipio: ${responseJson.localidade}</li>`;
        enderecoCompleto.innerHTML += `<li class="">Bairro: ${responseJson.bairro}</li>`;
        enderecoCompleto.innerHTML += `<li class="">Endereço: ${responseJson.logradouro}</li>`;
        enderecoCompleto.innerHTML += `<li class="">uf: ${responseJson.uf}</li>`;
        enderecoCompleto.innerHTML += `<li class="">cep: ${responseJson.cep}</li>`;
    })
    .catch(error => console.log(error));
}

const btnConsultar = document.getElementById('btnProcurar');
btnConsultar.addEventListener('click', buscarCep);

