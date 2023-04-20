// /* -------- Endereço ------- */
// var enderecoStorage = JSON.parse(localStorage.getItem('enderecosU'))

// var continuar = false

// const nao_possui = document.getElementById("nao_possui")
// const infos_enderecos = document.getElementById("infos_enderecos")
// const btn_cadastrarEnd = document.getElementById("btn_cadastrarEnd")


// btn_cadastrarEnd.addEventListener("click", () => {
//     window.location.href = "cadastrar_endereco.php";
// })

// var clienteLogado = verifica()


// if (clienteLogado) {

//     infos_enderecos.style = "visibility: visible; display: block;"

//     addEnd()

// }


// function verifica() {

//     if (clientes) {
//         for (el of clientes) {
//             if (el.login == true) {
//                 if (enderecoStorage) {
//                     for (end of enderecoStorage) {
//                         if (end.cpf == el.cpf) {

//                             nao_possui.style = "visibility: hidden; display: none;"
//                             return el;
//                         }
//                     }
//                 }
//                 nao_possui.textContent = "Você não possui endereços cadastrado!"
//                 return false;
//             }
//         }
//         nao_possui.parentNode.innerHTML = `<a href="login.php" style="font-size: 2rem;color: red; padding: 0; margin: 4rem;">Faça login</a>`
//     }
// }

// function addEnd() {
//     let i = 0

//     infos_enderecos.innerHTML = ""

//     for (el of enderecoStorage) {
        

//         if (el.cpf == clienteLogado.cpf) {
//             infos_enderecos.innerHTML +=
//                 `
//             <div class="novoEnd" name="${i}">
//                 <div class="row">
//                     <div class="column">
//                         <div class="row">
//                             <span>CEP: ${el.cep}</span>
//                             <span>Bairro: ${el.bairro}</span>
//                         </div>
//                         <div class="row">
//                             <span>Rua: ${el.rua}</span>
//                             <span>N°: ${el.numero}</span>
//                         </div>
//                         <div class="row">
//                             <span>Cidade: ${el.cidade}</span>
//                             <span>Estado: ${el.estado}</span>
//                         </div>
//                     </div>
//                     <img src="img/lixeira.png" class="lixeira">
//                 </div>
//             </div>
//             `
//         }

//         i++
//     }

//     const lixeira = document.querySelectorAll(".lixeira")

//     for (el of lixeira) {
//         el.addEventListener("click", removeEnd)
//     }
// }

// function removeEnd() {


//     let attStorage = []

//     for (i = 0; i < enderecoStorage.length; i++) {
//         if (i != this.parentNode.parentNode.getAttribute("name")) {
//             attStorage.push(enderecoStorage[i])
//         }
//     }

//     enderecoStorage = attStorage

//     localStorage.setItem('enderecosU', JSON.stringify(enderecoStorage))

//     addEnd()

//     for (end of enderecoStorage) {
//         if (end.cpf == clienteLogado.cpf) {
//             return
//         }
//     }

//     nao_possui.style = "visibility: visible; display: block;"
//     nao_possui.textContent = "Você não possui endereços cadastrado!"

// }
