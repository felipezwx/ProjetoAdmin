-- CTE para listar produtos com estoque baixo

WITH estoque_baixo AS (
    SELECT
        id_produto,
        nome,
        estoque
    FROM produtos
    WHERE estoque <= 5
)

SELECT *
FROM estoque_baixo;