"use strict";
var carregarProdutos = async () => {
    try {
        const resposta = await fetch("api/dados_produtos.php");
        const produtos = await resposta.json();
        const totalProdutos = produtos.length;
        const estoqueBaixo = produtos.filter((produto) => Number(produto.estoque) <= 5).length;
        const valorTotal = produtos.reduce((total, produto) => {
            return total + (Number(produto.preco) * Number(produto.estoque));
        }, 0);
        const nomesProdutos = produtos.map((produto) => produto.nome);
        console.log("Nomes dos produtos:", nomesProdutos);
        const rankingProdutos = [...produtos].sort((a, b) => {
            const valorA = Number(a.preco) * Number(a.estoque);
            const valorB = Number(b.preco) * Number(b.estoque);
            return valorB - valorA;
        });
        const rankingFormatado = rankingProdutos.slice(0, 5).map((produto) => {
            const valorEstoque = Number(produto.preco) * Number(produto.estoque);
            return {
                nome: produto.nome,
                valor: valorEstoque
            };
        });
        const campoRanking = document.getElementById("rankingProdutos");
        if (campoRanking) {
            campoRanking.textContent = "";
            rankingFormatado.forEach((produto) => {
                const item = document.createElement("li");
                item.textContent =
                    produto.nome +
                        " - R$ " +
                        produto.valor.toFixed(2).replace(".", ",");
                campoRanking.appendChild(item);
            });
        }
        console.log("Ranking de produtos:", rankingProdutos);
        const campoTotal = document.getElementById("totalProdutos");
        const campoValor = document.getElementById("valorEstoque");
        const campoEstoque = document.getElementById("estoqueBaixo");
        if (campoTotal) {
            campoTotal.innerText = totalProdutos.toString();
        }
        if (campoValor) {
            campoValor.innerText = valorTotal.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL"
            });
        }
        if (campoEstoque) {
            campoEstoque.innerText = estoqueBaixo.toString();
        }
        const tabela = document.getElementById("tabelaRelatorio");
        const filtro = document.getElementById("filtroCategoria");
        const campoBusca = document.getElementById("campoBusca");
        const btnAnterior = document.getElementById("btnAnterior");
        const btnProxima = document.getElementById("btnProxima");
        const paginaAtual = document.getElementById("paginaAtual");
        let pagina = 1;
        const limite = 10;
        function mostrarRelatorio(lista) {
            if (tabela) {
                tabela.textContent = "";
                if (lista.length == 0) {
                    const linha = document.createElement("tr");
                    const coluna = document.createElement("td");
                    coluna.colSpan = 5;
                    coluna.textContent = "Nenhum produto encontrado.";
                    linha.appendChild(coluna);
                    tabela.appendChild(linha);
                    return;
                }
                lista.forEach((produto) => {
                    const valorEstoque = Number(produto.preco) * Number(produto.estoque);
                    const linha = document.createElement("tr");
                    const colunaNome = document.createElement("td");
                    colunaNome.textContent = produto.nome;
                    const colunaCategoria = document.createElement("td");
                    colunaCategoria.textContent = produto.categoria;
                    const colunaPreco = document.createElement("td");
                    colunaPreco.textContent =
                        "R$ " + Number(produto.preco).toFixed(2);
                    const colunaEstoque = document.createElement("td");
                    colunaEstoque.textContent = produto.estoque;
                    const colunaValor = document.createElement("td");
                    colunaValor.textContent =
                        "R$ " + valorEstoque.toFixed(2);
                    linha.appendChild(colunaNome);
                    linha.appendChild(colunaCategoria);
                    linha.appendChild(colunaPreco);
                    linha.appendChild(colunaEstoque);
                    linha.appendChild(colunaValor);
                    tabela.appendChild(linha);
                });
            }
        }
        async function carregarRelatorio() {
            const categoria = filtro ? filtro.value : "todos";
            const busca = campoBusca ? campoBusca.value : "";
            const offset = (pagina - 1) * limite;
            try {
                const respostaRelatorio = await fetch("api/dados_produtos.php?categoria=" +
                    encodeURIComponent(categoria) +
                    "&busca=" +
                    encodeURIComponent(busca) +
                    "&limite=" +
                    limite +
                    "&offset=" +
                    offset);
                const lista = await respostaRelatorio.json();
                mostrarRelatorio(lista);
                if (paginaAtual) {
                    paginaAtual.textContent = "Página " + pagina;
                }
                if (btnAnterior) {
                    btnAnterior.disabled = pagina == 1;
                }
                if (btnProxima) {
                    btnProxima.disabled = lista.length < limite;
                }
            }
            catch (erro) {
                console.log("Erro ao carregar relatório");
            }
        }
        carregarRelatorio();
        if (filtro) {
            filtro.addEventListener("change", () => {
                pagina = 1;
                carregarRelatorio();
            });
        }
        if (campoBusca) {
            campoBusca.addEventListener("input", () => {
                pagina = 1;
                carregarRelatorio();
            });
        }
        if (btnAnterior) {
            btnAnterior.addEventListener("click", () => {
                if (pagina > 1) {
                    pagina--;
                    carregarRelatorio();
                }
            });
        }
        if (btnProxima) {
            btnProxima.addEventListener("click", () => {
                pagina++;
                carregarRelatorio();
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
