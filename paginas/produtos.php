<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../framework/servicos/produtosService.php';


$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$itemsPerPage = 5;

$data = carregarProdutos($page, $itemsPerPage);
$productsPage = $data['products'];
$totalPages = $data['totalPages'];
$totalItems = $data['totalItems'];

?>
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
                <form method="GET" action="" style="display: flex; gap: 0.5rem; align-items: center; margin-left: auto;">
                    <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" placeholder="Pesquisar por produto" class="input-search" />
                    <button type="submit" class="btn btn-primary">Procurar</button>
                </form>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Valor da Unidade</th>
                            <th>Quantidade</th>
                            <th>Valor Total</th>
                        </tr>
                    </thead>
                    <tbody id="products-tbody">
                        <?php

                        foreach ($productsPage as $prod): ?>
                            <tr>
                                <td><?= htmlspecialchars($prod->id) ?></td>
                                <td><?= htmlspecialchars($prod->name) ?></td>
                                <td>R$ <?= number_format($prod->unitCost, 2, ',', '.') ?></td>
                                <td><?= htmlspecialchars($prod->quantity) ?></td>
                                <td>R$ <?= number_format($prod->salePrice, 2, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="pagination" id="products-pagination">
                <button class="btn btn-secondary" <?= $page === 1 ? 'disabled' : '' ?> onclick="location.href='?page=<?= $page - 1 ?>'">Anterior</button>

                <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                    <?php if ($p == $page): ?>
                        <button class="btn btn-primary active" disabled><?= $p ?></button>
                    <?php else: ?>
                        <button class="btn btn-secondary" onclick="location.href='?page=<?= $p ?>'"><?= $p ?></button>
                    <?php endif; ?>
                <?php endfor; ?>

                <button class="btn btn-secondary" <?= $page === $totalPages ? 'disabled' : '' ?> onclick="location.href='?page=<?= $page + 1 ?>'">Próximo</button>
            </div>
        </main>
    </div>

</body>

</html>