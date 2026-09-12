"use strict";
var carregarProdutos = async () => {
    try {
        const resposta = await fetch("api/dados_produtos.php");
        const produtos = await resposta.json();
        if (produtos.length == 0) {
            console.log("Nenhum produto encontrado");
            return;
        }
        const totalProdutos = produtos.length;
        const estoqueBaixo = produtos.filter((produto) => Number(produto.estoque) <= 5).length;
        const valorTotal = produtos.reduce((total, produto) => {
            return total + (Number(produto.preco) * Number(produto.estoque));
        }, 0);
        const campoTotal = document.getElementById("totalProdutos");
        const campoValor = document.getElementById("valorEstoque");
        const campoEstoque = document.getElementById("estoqueBaixo");
        if (campoTotal) {
            campoTotal.innerText = totalProdutos.toString();
        }
        if (campoValor) {
            campoValor.innerText = "R$ " + valorTotal.toFixed(2).replace(".", ",");
        }
        if (campoEstoque) {
            campoEstoque.innerText = estoqueBaixo.toString();
        }
        const tabela = document.getElementById("tabelaRelatorio");
        const filtro = document.getElementById("filtroCategoria");
        function mostrarRelatorio(lista) {
            if (tabela) {
                tabela.innerHTML = "";
                lista.forEach(produto => {
                    const valorEstoque = Number(produto.preco) * Number(produto.estoque);
                    tabela.innerHTML += `
                        <tr>
                            <td>${produto.nome}</td>
                            <td>${produto.categoria}</td>
                            <td>R$ ${Number(produto.preco).toFixed(2)}</td>
                            <td>${produto.estoque}</td>
                            <td>R$ ${valorEstoque.toFixed(2)}</td>
                        </tr>
                    `;
                });
            }
        }
        mostrarRelatorio(produtos);
        if (filtro) {
            filtro.addEventListener("change", async () => {
                const categoria = filtro.value;
                try {
                    const respostaFiltro = await fetch("api/dados_produtos.php?categoria=" + encodeURIComponent(categoria));
                    const produtosFiltrados = await respostaFiltro.json();
                    mostrarRelatorio(produtosFiltrados);
                }
                catch (erro) {
                    console.log("Erro ao filtrar produtos");
                }
            });
        }
        console.log("Valor total do estoque:", valorTotal);
        console.log(produtos);
    }
    catch (erro) {
        console.log("Erro ao carregar produtos");
    }
};
carregarProdutos();
