var pedidos = JSON.parse(localStorage.getItem('carrinho'))


async function enviarServidor() {
    await fetch("finalizar_pedido.php", {
        method: "POST",
        body: JSON.stringify(pedidos),
        headers: {
            "Content-Type": "application/json"
        }
    })

}

