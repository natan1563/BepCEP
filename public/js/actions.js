function buscarCep(event) {
    event.preventDefault();

    const cep = document.getElementById("buscarCep").value;

    if (!cep.length) return false;

    fetch(`https://viacep.com.br/ws/${cep}/xml/`)
    .then(response => {
        console.log(response);
    });
}

const btnConsultar = document.getElementById('btnProcurar');
btnConsultar.addEventListener('click', buscarCep);

