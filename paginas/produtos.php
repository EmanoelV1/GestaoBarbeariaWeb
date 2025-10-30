<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Barbearia ERP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../estilos/estilo.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        <!-- Componente Sidebar -->
        <?php include '../componentes/menu.php'; ?>

        <main class="flex-fill">
            <header class="bg-white border-bottom p-3">
                <button class="btn btn-light btn-sm" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
            </header>

            <div class="content p-4">
                <div class="mb-4">
                    <h2 class="mb-1">Produtos</h2>
                    <p class="text-muted small">Gerencie o estoque de produtos da barbearia</p>
                </div>

                <div class="table-container">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Produto</th>
                                <th>Categoria</th>
                                <th class="text-end">Estoque</th>
                                <th class="text-end">Preço</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">Pomada Modeladora</td>
                                <td class="align-middle">
                                    <span class="badge bg-secondary">Cabelo</span>
                                </td>
                                <td class="text-end align-middle">15 un.</td>
                                <td class="text-end align-middle fw-medium">R$ 35,00</td>
                            </tr>
                            <tr>
                                <td class="align-middle">Óleo para Barba</td>
                                <td class="align-middle">
                                    <span class="badge bg-secondary">Barba</span>
                                </td>
                                <td class="text-end align-middle">
                                    <span class="text-danger fw-medium">8 un.</span>
                                </td>
                                <td class="text-end align-middle fw-medium">R$ 28,00</td>
                            </tr>
                            <tr>
                                <td class="align-middle">Shampoo Profissional</td>
                                <td class="align-middle">
                                    <span class="badge bg-secondary">Cabelo</span>
                                </td>
                                <td class="text-end align-middle">12 un.</td>
                                <td class="text-end align-middle fw-medium">R$ 42,00</td>
                            </tr>
                            <tr>
                                <td class="align-middle">Cera Fixadora</td>
                                <td class="align-middle">
                                    <span class="badge bg-secondary">Cabelo</span>
                                </td>
                                <td class="text-end align-middle">
                                    <span class="text-danger fw-medium">5 un.</span>
                                </td>
                                <td class="text-end align-middle fw-medium">R$ 32,00</td>
                            </tr>
                            <tr>
                                <td class="align-middle">Pente de Madeira</td>
                                <td class="align-middle">
                                    <span class="badge bg-secondary">Acessórios</span>
                                </td>
                                <td class="text-end align-middle">20 un.</td>
                                <td class="text-end align-middle fw-medium">R$ 18,00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>