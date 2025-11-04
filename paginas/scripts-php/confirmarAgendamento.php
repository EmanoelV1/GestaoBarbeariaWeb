<?php
require_once __DIR__ . '/../../framework/servicos/agendamentosService.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['appointment_id'])) {
    $id = (int)$_POST['appointment_id'];

    $success = confirmarAgendamento($id);

    if ($success) {
        header('Location: ../agendamentos.php?msg=confirmado');
    } else {
        header('Location: ../agendamentos.php?msg=erro');
    }
    exit;
}

header('Location: ../agendamentos.php');
exit;
