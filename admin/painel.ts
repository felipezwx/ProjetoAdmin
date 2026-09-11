var carregarProdutos = async () => {

    try {

        const resposta = await fetch("api/dados_produtos.php");

        const produtos = await resposta.json();

        if (produtos.length == 0) {
            console.log("Nenhum produto encontrado");
            return;
        }

        const totalProdutos = produtos.length;

        const estoqueBaixo = produtos.filter(
            (produto: { estoque: string }) => Number(produto.estoque) <= 5
        ).length;

        const valorTotal = produtos.reduce(
            (total: number, produto: { preco: string, estoque: string}) => {

            return total + (Number(produto.preco) * Number(produto.estoque));

            }, 0
        );

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


        console.log("Valor total do estoque:", valorTotal);

        console.log(produtos);

    } catch (erro) {

        console.log("Erro ao carregar produtos");

    }

}

carregarProdutos();