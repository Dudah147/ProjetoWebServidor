const mais = document.querySelectorAll(".mais")
const menos = document.querySelectorAll(".menos")
const tamanho = document.querySelectorAll("[tamanho]")

let max_sabores = 0
let quantTotal = 0
let sabores = []
let flag = 0

for (a of tamanho) {
    a.addEventListener("click", verificaQuant)
}

for (el of mais) {
    el.addEventListener("click", armazena)
}

for (el of menos) {
    el.addEventListener("click", remover)
}

function verificaQuant(){
    max_sabores = this.getAttribute("tamanho")
}

function remover(){
    let quant = this.parentNode.children[1]

    if(quantTotal > 0){
        quantTotal--
        quant.innerHTML = parseInt(quant.innerText) - 1
    }
}

function armazena(){
    let info = document.getElementById("sabores_id").children[2]
    let sabor = this.parentNode.parentNode.children[1].innerText
    let quant = this.parentNode.children[1]
    let feedback = document.createElement("div")
    feedback.setAttribute("id", "feedback")
    

    if(max_sabores == 0){
        document.body.appendChild(feedback)
        feedback.innerHTML =
        `<span>Escolha o tamanho</span>
        <div></div>`
    }
    else{
        if(quantTotal < max_sabores){
            quant.innerHTML = parseInt(quant.innerText) + 1
            console.log(quant)
            quantTotal++

            sabores.push(sabor)
            flag = 0
        }
        else{
            document.body.appendChild(feedback)
            feedback.innerHTML =
            `<span>Quantidade máxima de sabores atingida</span>
            <div></div>`
        }
        if(quantTotal == max_sabores){
            //cria input hidden para armazenar valores dos sabores
            
            let input = document.createElement("input")
            input.setAttribute("value", sabores)
            input.setAttribute("name", "sabores")
            input.setAttribute("type", "hidden")
            if(flag == 0){
                info.appendChild(input)
                flag = 1
            }
        }
        
    }
    
}