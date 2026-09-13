type Produto = {
    id_produtos: string;
    nome: string;
    categoria: string;
    preco: string;
    estoque: string;
    valor_estoque: string;
};

var carregarProdutos = async () => {

    try {

        const resposta = await fetch("api/dados_produtos.php");

        const produtos: Produto[] = await resposta.json();

        const totalProdutos = produtos.length;

        const estoqueBaixo = produtos.filter(
            (produto: Produto) => Number(produto.estoque) <= 5
        ).length;

        const valorTotal = produtos.reduce(
            (total: number, produto: Produto) => {

                return total + (Number(produto.preco) * Number(produto.estoque));

            }, 0
        );

        const nomesProdutos = produtos.map(
            (produto: Produto) => produto.nome
        );

        console.log("Nomes dos produtos:", nomesProdutos);

        const rankingProdutos = [...produtos].sort(
            (a: Produto, b: Produto) => {

                const valorA =
                    Number(a.preco) * Number(a.estoque);

                const valorB =
                    Number(b.preco) * Number(b.estoque);

                return valorB - valorA;
            }
        );

        const campoRanking = document.getElementById("rankingProdutos");

        if (campoRanking) {

            campoRanking.textContent = "";

            rankingProdutos.slice(0, 5).forEach((produto: Produto) => {

                const valorEstoque =
                    Number(produto.preco) * Number(produto.estoque);

                const item = document.createElement("li");

                item.textContent =
                    produto.nome +
                    " - R$ " +
                    valorEstoque.toFixed(2).replace(".", ",");

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
            campoValor.innerText = "R$ " + valorTotal.toFixed(2).replace(".", ",");
        }

        if (campoEstoque) {
            campoEstoque.innerText = estoqueBaixo.toString();
        }

        const tabela = document.getElementById("tabelaRelatorio");

        const filtro = document.getElementById("filtroCategoria") as HTMLSelectElement;


        function mostrarRelatorio(lista: Produto[]) {

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

                lista.forEach((produto: Produto) => {

                    const valorEstoque =
                        Number(produto.preco) * Number(produto.estoque);

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

        mostrarRelatorio(produtos);

        if (filtro) {

            filtro.addEventListener("change", async () => {

                const categoria = filtro.value;

                try {

                    const respostaFiltro = await fetch(
                        "api/dados_produtos.php?categoria=" + encodeURIComponent(categoria)
                    );

                    const produtosFiltrados: Produto[] = await respostaFiltro.json();

                    mostrarRelatorio(produtosFiltrados);

                } catch (erro) {

                    console.log("Erro ao filtrar produtos");

                }

            });

        }



        console.log("Valor total do estoque:", valorTotal);

        console.log(produtos);

    } catch (erro) {

        console.log("Erro ao carregar produtos");

    }

}

carregarProdutos();