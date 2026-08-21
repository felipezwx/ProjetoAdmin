function filtrarProdutos(lista, categoria){

    if(categoria === "todos"){
        return lista;
    }

    if(categoria === "promocao"){

        console.log("Promoções clicado");

        return lista.filter(
            produto => produto.promocao == 1 || produto.promocao == "1"
        );
    }

    return lista.filter(
        produto => produto.categoria === categoria
    );
}

function mostrarProdutos(categoria){

    const lista = document.getElementById("listaProdutos");

    lista.innerHTML = "";

    const produtosFiltrados = filtrarProdutos(produtos, categoria);

    produtosFiltrados.forEach(produto => {

        lista.innerHTML += `
        
        <div class="col-md-4 mb-4">

            <div class="produto-card">

                <img src="${produto.imagem}" class="img-fluid">

                <h5 class="mt-3">
                    ${produto.nome}
                </h5>

                <p>
                    R$ ${parseFloat(produto.preco).toFixed(2)}
                </p>

                <a href="produto.php?id=${produto.id_produto}" class="btn btn-dark">
                    Ver Produto
                </a>

            </div>

        </div>
        
        `;
    });

}

mostrarProdutos("todos");