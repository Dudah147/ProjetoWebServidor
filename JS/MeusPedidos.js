
const container_meus_pedidos = document.getElementById("container")

//MEUS PEDIDOS
const meus_pedidos = document.getElementById("meus_pedidos")
const ver_detalhes = document.querySelectorAll(".ver_detalhes")

for (el of ver_detalhes) {
    el.addEventListener("click", ver_detalhes_event)
}

function ver_detalhes_event() {

    for (pedido of pedidos) {
        console.log(this.parentNode.children[0].getAttribute("id_pedido"))
        if (pedido["id_pedido"] == this.parentNode.children[0].getAttribute("id_pedido")) {
            abre_pedido(pedido)
        }
    }
}

function abre_pedido(pedido) {
    console.log(pedido)
    meus_pedidos.style.display = "none"
    const div_pedido = document.createElement("div")
    div_pedido.setAttribute("class", "div_pedido")
    container_meus_pedidos.appendChild(div_pedido)

    div_pedido.innerHTML = `
        <button id="botao_voltar">Voltar</button>
        <h2>Pedido ${pedido['id_pedido']}</h2>
        <span>Realizado às: ${pedido['data']}</span>
        <hr>
        <h3>PRODUTOS</h3>
    `
    for (item of pedido["itens"]) {
        div_pedido.innerHTML += `
            <div class="item">
                <span>${item['tamanho']}</span>
                <strong>R$ ${item['total']}</strong>
            </div>
        `
    }
    div_pedido.innerHTML += `
    <hr>
        <span>Total do pedido: <strong style="color: green"> R$${pedido['valor_total']}</strong></span>
    `

    const botao_voltar = document.getElementById("botao_voltar")
    botao_voltar.addEventListener("click", voltar_pedidos)
}

function voltar_pedidos() {
    console.log(this.parentNode)
    this.parentNode.remove()
    meus_pedidos.style.display = "flex"
}