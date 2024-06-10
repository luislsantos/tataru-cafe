let carrinho = [{}];

function addAoCarrinho(id){
    let qtde = parseInt(document.getElementById("qtde-" + id).value);

    const produtoExistente = carrinho.find(item => item.id == id);

    if(produtoExistente) {
        produtoExistente.qtde += qtde;
        carrinho.forEach(produto => {
            console.log(produto);
        });
    } else {
        carrinho.push({id,qtde});
        carrinho.forEach(produto => {
            console.log(produto);
        });
        

    }
}

function mostraCarrinho() {
    let listaCarrinho = document.getElementById("produtos-carrinho");
    return carrinho;
}