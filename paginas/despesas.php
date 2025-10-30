<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despesas - Barbearia ERP</title>
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
                    <h2 class="mb-1">Despesas</h2>
                    <p class="text-muted small">Controle as despesas da barbearia</p>
                </div>

                <div class="table-container">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Descrição</th>
                                <th class="text-end">Valor</th>
                                <th>Data</th>
                                <th>Tipo</th>
                                <th>Parcelas</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">Aluguel</td>
                                <td class="text-end align-middle fw-medium">R$ 2.500,00</td>
                                <td class="align-middle">
                                    <small>05/10/2025</small>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-secondary">Única</span>
                                </td>
                                <td class="align-middle text-muted">
                                    <small>-</small>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-success">Pago</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Energia Elétrica</td>
                                <td class="text-end align-middle fw-medium">R$ 350,00</td>
                                <td class="align-middle">
                                    <small>10/10/2025</small>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-secondary">Única</span>
                                </td>
                                <td class="align-middle text-muted">
                                    <small>-</small>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-success">Pago</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Equipamento Novo</td>
                                <td class="text-end align-middle fw-medium">R$ 400,00</td>
                                <td class="align-middle">
                                    <small>15/10/2025</small>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-primary">Parcelada</span>
                                </td>
                                <td class="align-middle text-muted">
                                    <small>1/5</small>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-danger">Pendente</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Material de Limpeza</td>
                                <td class="text-end align-middle fw-medium">R$ 180,00</td>
                                <td class="align-middle">
                                    <small>20/10/2025</small>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-secondary">Única</span>
                                </td>
                                <td class="align-middle text-muted">
                                    <small>-</small>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-danger">Pendente</span>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="table-light border-top">
                            <tr>
                                <td class="fw-semibold">Total</td>
                                <td class="text-end fw-semibold">R$ 3.430,00</td>
                                <td colspan="4"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>