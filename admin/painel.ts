const carregarProdutos = async () => {

    try {

        const resposta = await fetch("api/dados_produtos.php");

        const produtos = await resposta.json();

        console.log(produtos);

    } catch (erro) {

        console.log("Erro ao carregar produtos");

    }

}

carregarProdutos();