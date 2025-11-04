<?php
require_once __DIR__ . '/../framework/enums/enumeradores.php';
require_once __DIR__ . '/../framework/entidades/Appointment.php'; // ajuste o caminho conforme seu projeto

// Mapeia o status do enum a partir de cada objeto vindo do json
// Convertendo para o enum do php
function mapStatusEnum(string $statusStr): AppointmentStatus
{
    return match (strtolower($statusStr)) {
        'pending' => AppointmentStatus::Pending,
        'confirmed' => AppointmentStatus::Confirmed,
        'completed' => AppointmentStatus::Completed,
        default => AppointmentStatus::Pending,
    };
}

// Mapeia o retorno do json para a classe Appointment do php
function mapArrayToAppointment(array $data): Appointment
{
    $appointment = new Appointment();

    $appointment->id = $data['id'] ?? 0;
    $appointment->clientName = $data['clientName'] ?? null;
    $appointment->observations = $data['observations'] ?? '';

    if (!empty($data['appointmentDateTime'])) {
        $appointment->appointmentDateTime = new DateTime($data['appointmentDateTime']);
    } else {
        $appointment->appointmentDateTime = new DateTime();
    }
    $appointment->appointmentEndDateTime = (clone $appointment->appointmentDateTime)->modify('+1 hour');

    $appointment->status = isset($data['status']) ? mapStatusEnum($data['status']) : AppointmentStatus::Pending;
    $appointment->servicePrice = $data['servicePrice'] ?? 0.0;

    return $appointment;
}

$apiUrl = 'http://localhost:5156/api/appointments';
$responseJson = file_get_contents($apiUrl);
if ($responseJson === false) {
    die('Erro ao acessar a API de Agendamentos.');
}
$responseData = json_decode($responseJson, true);
if ($responseData === null) {
    die('Erro ao decodificar resposta JSON da API.');
}

$appointmentsArray = $responseData['appointments'] ?? [];

$appointments = [];
foreach ($appointmentsArray as $data) {
    $appointments[] = mapArrayToAppointment($data);
}

$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$itemsPerPage = 5;
$totalItems = count($appointments);
$totalPages = (int)ceil($totalItems / $itemsPerPage);

$startIndex = ($page - 1) * $itemsPerPage;
$appointmentsPage = array_slice($appointments, $startIndex, $itemsPerPage);
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
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Serviço (Preço)</th>
                            <th>Data/Hora</th>
                            <th>Status</th>
                            <th>Observações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointmentsPage as $apt): ?>
                            <tr>
                                <td><?= $apt->id ?></td>
                                <td><?= htmlspecialchars($apt->clientName) ?></td>
                                <td>R$ <?= number_format($apt->servicePrice, 2, ',', '.') ?></td>
                                <td><?= $apt->appointmentDateTime->format('d/m/Y H:i') ?></td>
                                <td><?= htmlspecialchars($apt->status->getDescription()) ?></td>
                                <td><?= htmlspecialchars($apt->observations) ?></td>
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
</body>

</html>