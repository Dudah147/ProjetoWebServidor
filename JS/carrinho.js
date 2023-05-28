
const carrinho_icone = document.getElementById("carrinho")
const id_carrinho = document.getElementById("carrinho_container")

carrinho_icone.addEventListener("click", abrirCarrinho)

mudaQuantCar()

container.addEventListener("click", () => {
    id_carrinho.style.visibility = "hidden"
    container.style.filter = "blur(0px)"
    mudaQuantCar()
})


/* ------------ CARRINHO ------------- */

function abrirCarrinho() {



    id_carrinho.style.visibility = "visible"
    container.style.filter = "blur(5px)"


    if (!carrinho || !carrinho[0]) {
        id_carrinho.style.padding = 0;
        id_carrinho.innerHTML =
            `
            <div style="font-size: 2rem;display: flex; flex-direction: column; align-items:center;margin: auto">
                <span>Carrinho Vazio</span>
                <a href="pedido" style="color:black; padding: 0; margin-top: 5rem">Fazer um pedido</a>
            </div>
        `


        return
    }

    itensCarrinho()

    const close = document.getElementById("close")
    const adicionarMais = document.getElementById("adicionarMais")
    const maisCar = document.querySelectorAll(".maisCar")
    const menosCar = document.querySelectorAll(".menosCar")
    const finalizar_pedido_btn = document.getElementById("finalizar_pedido_btn")

    adicionarMais.addEventListener("click", () => {
        window.location.href = "pedido";
    })

    close.addEventListener("click", () => {
        id_carrinho.style.visibility = "hidden"
        container.style.filter = "blur(0px)"
        mudaQuantCar()
    })

    finalizar_pedido_btn.addEventListener("click", finalizarPedido)
}

function itensCarrinho() {
    let itens_carrinho = document.getElementById("itens_carrinho")
    let totalPedido_id = document.getElementById("totalPedido")
    let totalPedido = 0
    itens_carrinho.innerHTML = ""

    console.log(carrinho[0])

    if (carrinho) {
        for (i = 0; i < carrinho.length; i++) {
            let sec = document.createElement("section")
            itens_carrinho.appendChild(sec)
            sec.innerHTML +=
                `

                <div class="carrinho-row" style="flex-direction: column; justify-content: normal; align-items: normal; font-size: 10px;">
                    <div class="carrinho-row" style="width: 60%">
                        <span style="margin: 0;">Massa ${carrinho[i].massa.massa}</span>
                        <span color: orange;">adicional de R$${carrinho[i].massa.preco}</span>
                    </div>
                    <div class="carrinho-row" style="width: 60%">
                        <span style="margin: 0;">Borda ${carrinho[i].borda.borda}</span>
                        <span color: orange;">adicional de R$${carrinho[i].borda.preco}</span>
                    </div>
                    <span style="display: flex; font-size: 10px";>--Sabores--</span>
                </div>
            `

            let totalSabor = 0
            for (el of carrinho[i].sabores) {
                sec.innerHTML +=
                    `
                <div class="carrinho-row" style="width: 97%; font-size: 10px;">
                    <div class="carrinho-row" style="width: 60%">
                        <span style="margin: 0;">${el.sabor}</span>
                        <span>adicional de R$${el.preco}</span>
                    </div>
                </div>
                `

            }

            sec.innerHTML +=
                `
                <h2 name="total" style="margin-top: 1rem; color: #03e703; display: flex; justify-content: center;">R$${(carrinho[i].total).toFixed(2)}</h2>
                <hr>
            `
            totalPedido += (carrinho[i].total)

        }
    }

    totalPedido_id.children[0].children[0].innerHTML = `R$${(totalPedido).toFixed(2)}`
}

function mudaQuantCar() {
    if (carrinho) {
        let quant_carrinho = carrinho_icone.parentNode.children[1]
        if (carrinho.length != 0) {
            quant_carrinho.style.visibility = "visible"
            quant_carrinho.textContent = carrinho.length
        }
    }
}


function finalizarPedido() {
    window.location.href = "finalizar_pedido";
}