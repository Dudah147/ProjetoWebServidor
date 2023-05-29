//Motor de busca CEP
let selectStreet = document.querySelector('#street');
let selectDistrict = document.querySelector('#district');
let selectCity = document.querySelector('#city');
let selectState = document.querySelector('#state');

selectStreet.disabled = true;

selectDistrict.disabled = true;

selectCity.disabled = true;

selectState.disabled = true;

document.querySelector('.busca').addEventListener('click', function (evt) {
    console.log(cep.value);
    let url = 'https://viacep.com.br/ws/' + cep.value + '/json/';

    let xhr = new XMLHttpRequest();

    xhr.onload = function (evt) {





        let jsonEndereco = JSON.parse(xhr.responseText);

        if (jsonEndereco.erro) {
            let feedback = document.createElement("div")
            feedback.setAttribute("id", "feedback")

            document.body.appendChild(feedback)
            feedback.innerHTML =
                `<span>Cep não encontrado, por favor, digite os outros campos manualmente</span>
            <div></div>`

            selectStreet.value = '';
            

            selectDistrict.value = '';
            
            selectCity.value = '';

            selectState.value = '';
        } else {
            selectStreet.value = jsonEndereco.logradouro;
            selectDistrict.value = jsonEndereco.bairro;

            selectCity.value = jsonEndereco.localidade;
            selectState.value = jsonEndereco.uf;
        }
        selectStreet.disabled = false;
        selectDistrict.disabled = false;
        selectCity.disabled = false;
        selectState.disabled = false;

    };

    xhr.open("GET", url, true);
    xhr.send();
});