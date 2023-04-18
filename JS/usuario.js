const user = document.getElementById("user")
const user_container = document.getElementById("user_container")
const container = document.getElementById("container")

user.addEventListener("click", abrirUsuario)

var clienteLogado = descobrirCliente()
if (clienteLogado != false) {
    mudaUser()
}

container.addEventListener("click", fecharUsuario)
/* --------- USUARIO ------------ */

function abrirUsuario() {
    user_container.style.visibility = "visible"
    container_pedido.style.filter = "blur(5px)"
}

function fecharUsuario() {
    user_container.style.visibility = "hidden"
    container.style.filter = "blur(0)"
}

function mudaUser() {
    let pai = document.getElementById("header_user")
    pai.children[0].textContent = `Olá ${clienteLogado.nome}`
    pai.children[1].textContent = `Deseja sair? Clique aqui`
}

function descobrirCliente() {
    if (!clientes) {
        return false
    }
    for (el of clientes) {
        if (el.login == true) {
            console.log(el)
            return el
        }
    }
    return false
}