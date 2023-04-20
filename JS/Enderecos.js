const lixeira = document.querySelectorAll(".lixeira")

for (el of lixeira) {
    el.addEventListener("click", removeItem)
}

function removeItem() {
    console.log(el.parentNode)
}