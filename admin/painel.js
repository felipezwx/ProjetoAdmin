"use strict";
var carregarProdutos = async () => {
    try {
        const resposta = await fetch("api/dados_produtos.php");
        const produtos = await resposta.json();
        const valorTotal = produtos.reduce((total, produto) => {
            return total + (Number(produto.preco) * Number(produto.estoque));
        }, 0);
        console.log("Valor total do estoque:", valorTotal);
        console.log(produtos);
    }
    catch (erro) {
        console.log("Erro ao carregar produtos");
    }
};
carregarProdutos();
