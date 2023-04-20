//Motor de busca CEP
document.querySelector('.busca').addEventListener('click', function (evt) {
    console.log(cep.value);
    let url = 'https://viacep.com.br/ws/' + cep.value + '/json/';

    let xhr = new XMLHttpRequest();

    xhr.onload = function (evt) {

        let selectStreet = document.querySelector('#street');
        let selectDistrict = document.querySelector('#district');
        let selectCity = document.querySelector('#city');
        let selectState = document.querySelector('#state');

        let jsonEndereco = JSON.parse(xhr.responseText);

        if (jsonEndereco.erro) {
            selectStreet.value = '';
            selectStreet.disabled = false;

            selectDistrict.value = '';
            selectDistrict.disabled = false;

            selectCity.value = '';
            selectCity.disabled = false;

            selectState.value = '';
            selectState.disabled = false;
        } else {
            selectStreet.value = jsonEndereco.logradouro;
            if (selectStreet.value == '') {
                selectStreet.disabled = false;
            }
            else {
                selectStreet.disabled = true;
            }
            selectDistrict.value = jsonEndereco.bairro;
            if (selectDistrict.value == '') {
                selectDistrict.disabled = false;
            }
            else {
                selectDistrict.disabled = true;
            }

            selectCity.value = jsonEndereco.localidade;
            if (selectCity.value == '') {
                selectCity.disabled = false;
            }
            else {
                selectCity.disabled = true;
            }
            selectState.value = jsonEndereco.uf;
            if (selectState.value == '') {
                selectState.disabled = true;
            }
            else {
                selectState.disabled = true;
            }
        }
    };

    xhr.open("GET", url, true);
    xhr.send();
});