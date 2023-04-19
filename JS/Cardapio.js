const tamanhos = resposta['tamanhos']
const massa = resposta['massa']
const bordas = resposta['bordas']
const sabores = resposta['sabores']
const tipo_selecionar = document.querySelectorAll(".tipos")
const info_container = document.getElementById("container_info")

console.log(resposta)

for (el of tipo_selecionar) {
    el.addEventListener("click", mudacor)
    el.addEventListener("click", mudaDiv)
}
function mudacor() {
    for (el of tipo_selecionar) {
        el.style.color = "white"
    }
    this.style.color = "orange"
}
function mudaDiv() {
    if (this.textContent == "TAMANHO") {
        info_container.innerHTML = ""
        for (i = 0; i < tamanhos.length; i++) {
            info_container.innerHTML +=
                `<div class="info">
                <span>${tamanhos[i].tamanho}</span>
                <span>${tamanhos[i].info}</span>
            </div>`
        }
    }
    else if (this.textContent == "MASSA") {
        info_container.innerHTML = ""
        for (i = 0; i < massa.length; i++) {
            info_container.innerHTML +=
                `<div class="info">
                <span>${massa[i].massa}</span>
                <span>${massa[i].info}</span>
            </div>`
        }
    }
    else if (this.textContent == "BORDA RECHEADA") {
        info_container.innerHTML = ""
        for (i = 0; i < bordas.length; i++) {
            info_container.innerHTML +=
                `<div class="info">
                <span>${bordas[i].borda}</span>
            </div>`
        }
    }
    else if (this.textContent == "TRADICIONAIS") {
        info_container.innerHTML = ""
        for (i = 0; i < sabores.length; i++) {
            if (sabores[i].tipo == "Tradicional") {
                info_container.innerHTML +=
                    `<div class="info">
                    <span>${sabores[i].sabor}</span>
                    <span>${sabores[i].info}</span>
                </div>`
            }
        }
    }
    else if (this.textContent == "ESPECIAIS") {
        info_container.innerHTML = ""
        for (i = 0; i < sabores.length; i++) {
            if (sabores[i].tipo == "Especial") {
                info_container.innerHTML +=
                    `<div class="info">
                    <span>${sabores[i].sabor}</span>
                    <span>${sabores[i].info}</span>
                </div>`
            }
        }
    }
    else if (this.textContent == "PREMIUM") {
        info_container.innerHTML = ""
        for (i = 0; i < sabores.length; i++) {
            if (sabores[i].tipo == "Premium") {
                info_container.innerHTML +=
                    `<div class="info">
                    <span>${sabores[i].sabor}</span>
                    <span>${sabores[i].info}</span>
                </div>`
            }
        }
    }
}
