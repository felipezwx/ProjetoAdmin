var carregarProdutos = async () => {

    try {

        const resposta = await fetch("api/dados_produtos.php");

        const produtos = await resposta.json();

        if (produtos.length == 0) {
            console.log("Nenhum produto encontrado");
            return;
        }

        const valorTotal = produtos.reduce((total: number, produto: { preco: string, estoque: string}) => {

        return total + (Number(produto.preco) * Number(produto.estoque));

        }, 0);

console.log("Valor total do estoque:", valorTotal);

        console.log(produtos);

    } catch (erro) {

        console.log("Erro ao carregar produtos");

    }

}

carregarProdutos();