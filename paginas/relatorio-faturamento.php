<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio Faturamento - Barbearia ERP</title>
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
                    <h2 class="mb-1">Relatórios Financeiros</h2>
                    <p class="text-muted small">Visão geral do faturamento da empresa</p>
                </div>

                <!-- KPI Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="card-subtitle text-muted mb-0 small">Receitas</h6>
                                    <i class="bi bi-trending-up text-primary fs-5"></i>
                                </div>
                                <h3 class="mb-1">R$ 170,00</h3>
                                <p class="text-muted small mb-0">2 agendamentos aprovados</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="card-subtitle text-muted mb-0 small">Despesas</h6>
                                    <i class="bi bi-trending-down text-danger fs-5"></i>
                                </div>
                                <h3 class="mb-1">R$ 3.430,00</h3>
                                <p class="text-muted small mb-0">4 despesas registradas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="card-subtitle text-muted mb-0 small">Saldo</h6>
                                    <i class="bi bi-cash-stack text-primary fs-5"></i>
                                </div>
                                <h3 class="mb-1 text-danger">R$ -3.260,00</h3>
                                <p class="text-muted small mb-0">Prejuízo no período</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="mb-0">Detalhamento por Categoria</h5>
                    </div>
                    <div class="card-body">
                        <div class="border-bottom pb-3 mb-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="mb-1 fw-medium">Serviços Realizados</p>
                                    <p class="text-muted small mb-0">Agendamentos aprovados</p>
                                </div>
                                <p class="mb-0 fw-semibold text-primary">R$ 170,00</p>
                            </div>
                        </div>
                        <div class="border-bottom pb-3 mb-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="mb-1 fw-medium">Despesas Operacionais</p>
                                    <p class="text-muted small mb-0">Custos fixos e variáveis</p>
                                </div>
                                <p class="mb-0 fw-semibold text-danger">- R$ 3.430,00</p>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="mb-1 fw-semibold">Resultado Final</p>
                                    <p class="text-muted small mb-0">Receitas - Despesas</p>
                                </div>
                                <p class="mb-0 fw-semibold text-danger">R$ -3.260,00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>