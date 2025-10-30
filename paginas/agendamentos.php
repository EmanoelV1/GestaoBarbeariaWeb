<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../estilos/estilo.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        <!-- Componente Sidebar -->
        <?php include '../componentes/menu.php'; ?>

        <!-- Main Content -->
        <main class="flex-fill">
            <header class="bg-white border-bottom p-3">
                <button class="btn btn-light btn-sm" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
            </header>

            <div class="content p-4">
                <div class="mb-4">
                    <h2 class="mb-1">Agendamentos</h2>
                    <p class="text-muted small">Gerencie os agendamentos dos clientes</p>
                </div>

                <?php

                require_once '../framework/enums/enumeradores.php';

                foreach (AppointmentStatus::cases() as $status) {

                    echo "<option value='{$status->value}'>";
                    echo $status->description();
                    echo "</option>";
                }
                ?>

                <div class="table-container">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>D/H do Agendamento</th>
                                <th>D/H Término do Agendamento</th>
                                <th>Nome do Cliente</th>
                                <th>Telefone do Cliente</th>
                                <th>Funcionário</th>
                                <th>Status</th>
                                <th>Valor</th>
                                <th>Tipo de Pagamento</th>
                                <th>Pago em</th>
                                <th>Criado em</th>
                                <th>Atualizado em</th>
                                <th class="text-end">Observações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">
                                    <small>30/10/2025 às 09:00</small>
                                </td>
                                <td class="align-middle">João Silva</td>
                                <td class="align-middle">Corte + Barba</td>
                                <td class="align-middle text-muted">
                                    <small>(11) 98765-4321</small>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-warning text-dark">Pendente</span>
                                </td>
                                <td class="text-end align-middle">
                                    <button class="btn btn-primary btn-sm me-1">
                                        <i class="bi bi-check-lg"></i> Aprovar
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-x-lg"></i> Rejeitar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <small>30/10/2025 às 09:00</small>
                                </td>
                                <td class="align-middle">João Silva</td>
                                <td class="align-middle">Corte + Barba</td>
                                <td class="align-middle text-muted">
                                    <small>(11) 98765-4321</small>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-warning text-dark">Pendente</span>
                                </td>
                                <td class="text-end align-middle">
                                    <button class="btn btn-primary btn-sm me-1">
                                        <i class="bi bi-check-lg"></i> Aprovar
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-x-lg"></i> Rejeitar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <small>30/10/2025 às 09:00</small>
                                </td>
                                <td class="align-middle">João Silva</td>
                                <td class="align-middle">Corte + Barba</td>
                                <td class="align-middle text-muted">
                                    <small>(11) 98765-4321</small>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-warning text-dark">Pendente</span>
                                </td>
                                <td class="text-end align-middle">
                                    <button class="btn btn-primary btn-sm me-1">
                                        <i class="bi bi-check-lg"></i> Aprovar
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-x-lg"></i> Rejeitar
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td class="align-middle">
                                    <small>30/10/2025 às 10:00</small>
                                </td>
                                <td class="align-middle">Carlos Santos</td>
                                <td class="align-middle">Corte</td>
                                <td class="align-middle text-muted">
                                    <small>(11) 98765-1234</small>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-success">Aprovado</span>
                                </td>
                                <td class="text-end align-middle"></td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <small>30/10/2025 às 11:00</small>
                                </td>
                                <td class="align-middle">Pedro Oliveira</td>
                                <td class="align-middle">Barba</td>
                                <td class="align-middle text-muted">
                                    <small>(11) 98765-5678</small>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-warning text-dark">Pendente</span>
                                </td>
                                <td class="text-end align-middle">
                                    <button class="btn btn-primary btn-sm me-1">
                                        <i class="bi bi-check-lg"></i> Aprovar
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-x-lg"></i> Rejeitar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <small>31/10/2025 às 14:00</small>
                                </td>
                                <td class="align-middle">Lucas Costa</td>
                                <td class="align-middle">Corte + Barba</td>
                                <td class="align-middle text-muted">
                                    <small>(11) 98765-9012</small>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-warning text-dark">Pendente</span>
                                </td>
                                <td class="text-end align-middle">
                                    <button class="btn btn-primary btn-sm me-1">
                                        <i class="bi bi-check-lg"></i> Aprovar
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-x-lg"></i> Rejeitar
                                    </button>
                                </td>
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