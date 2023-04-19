const user = document.getElementById("user")
const user_container = document.getElementById("user_container")
const container = document.getElementById("container")

user.addEventListener("click", abrirUsuario)


container.addEventListener("click", fecharUsuario)
/* --------- USUARIO ------------ */

function abrirUsuario() {
    user_container.style.visibility = "visible"
    container.style.filter = "blur(5px)"
}

function fecharUsuario() {
    user_container.style.visibility = "hidden"
    container.style.filter = "blur(0)"
}
