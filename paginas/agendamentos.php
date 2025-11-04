<?php
require_once __DIR__ . '/../framework/servicos/agendamentosService.php';


$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$itemsPerPage = 5;

$data = carregarAgendamentos($page, $itemsPerPage);
$appointmentsPage = $data['appointments'];
$totalPages = $data['totalPages'];
$totalItems = $data['totalItems'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>BarberShop ERP - Agendamentos</title>
    <link rel="stylesheet" href="../estilos/styles.css" />
</head>

<body>
    <div class="container">

        <?php include '../componentes/menu.php' ?>

        <main class="main-content">
            <div class="view-header">
                <h2>Agendamentos</h2>
                <form method="GET" action="" style="display: flex; gap: 0.5rem; align-items: center; margin-left: auto;">
                    <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" placeholder="Pesquisar por cliente" class="input-search" />
                    <button type="submit" class="btn btn-primary">Procurar</button>
                </form>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Serviço (Preço)</th>
                            <th>Data/Hora</th>
                            <th>Status</th>
                            <th>Observações</th>
                            <th>Operar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once __DIR__ . '/../framework/enums/enumeradores.php';

                        foreach ($appointmentsPage as $apt): ?>
                            <tr>
                                <td><?= htmlspecialchars($apt->id) ?></td>
                                <td><?= htmlspecialchars($apt->clientName) ?></td>
                                <td>R$ <?= number_format($apt->servicePrice, 2, ',', '.') ?></td>
                                <td><?= $apt->appointmentDateTime->format('d/m/Y H:i') ?></td>
                                <td><?= htmlspecialchars($apt->status->getDescription()) ?></td>
                                <td><?= htmlspecialchars($apt->observations) ?></td>
                                <td>
                                    <?php if ($apt->status == AppointmentStatus::Pending): ?>
                                        <div class="btn-group">
                                            <form method="post" action="./scripts-php/confirmarAgendamento.php" style="display:inline;">
                                                <input type="hidden" name="appointment_id" value="<?= $apt->id ?>" />
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    Confirmar
                                                </button>
                                            </form>
                                            <form method="post" action="rejeitar_agendamento.php" style="display:inline;">
                                                <input type="hidden" name="appointment_id" value="<?= $apt->id ?>" />
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Rejeitar
                                                </button>
                                            </form>
                                        </div>
                                    <?php else: ?>
                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="pagination" id="appointments-pagination">
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

    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-info" style="margin-bottom:1rem;">
            <?php
            switch ($_GET['msg']) {
                case 'confirmado':
                    echo "Agendamento confirmado com sucesso.";
                    break;
                case 'erro':
                    echo "Erro ao confirmar o agendamento.";
                    break;
                default:
                    echo "";
            }
            ?>
        </div>
    <?php endif; ?>

</body>

</html>