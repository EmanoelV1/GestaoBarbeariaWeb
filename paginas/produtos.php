<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberShop ERP - Produtos</title>

    <link rel="stylesheet" href="../estilos/styles.css">
</head>

<body>
    <div class="container">

        <?php include '../componentes/menu.php' ?>

        <main class="main-content">
            <div class="view-header">
                <h2>Produtos</h2>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Preço</th>
                            <th>Estoque</th>
                        </tr>
                    </thead>
                    <tbody id="products-tbody"></tbody>
                </table>
            </div>
            <div class="pagination" id="products-pagination"></div>
        </main>
    </div>
    <script src="produtos.js"></script>
</body>

</html>