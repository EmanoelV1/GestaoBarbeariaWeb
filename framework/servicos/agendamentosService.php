<?php
require_once __DIR__ . '/../enums/enumeradores.php';
require_once __DIR__ . '/../entidades/Appointment.php';

// Métodos utilitários para mapeamento da resposta do endpoint e conversão
// Para a aplicação php

function mapearStatusAgendamento(string $statusStr): AppointmentStatus
{
    return match (strtolower($statusStr)) {
        '1' => AppointmentStatus::Pending,
        '2' => AppointmentStatus::Confirmed,
        '3' => AppointmentStatus::Completed,
        default => AppointmentStatus::Pending,
    };
}

function mapearJsonParaEntidadeAgendamento(array $data): Appointment
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

    $appointment->status = isset($data['status']) ? mapearStatusAgendamento($data['status']) : AppointmentStatus::Pending;
    $appointment->servicePrice = $data['servicePrice'] ?? 0.0;

    return $appointment;
}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// Carrega os agendamentos realizando uma requisição GET
// para o endpoint de agendamentos e devolve paginado 

function carregarAgendamentos(int $page, int $itemsPerPage): array
{
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
        $appointments[] = mapearJsonParaEntidadeAgendamento($data);
    }

    $totalItems = count($appointments);
    $totalPages = (int)ceil($totalItems / $itemsPerPage);
    $startIndex = ($page - 1) * $itemsPerPage;
    $appointmentsPage = array_slice($appointments, $startIndex, $itemsPerPage);

    return [
        'appointments' => $appointmentsPage,
        'totalItems' => $totalItems,
        'totalPages' => $totalPages,
    ];
}


// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// Confirma um agendamento com base no Id

function confirmarAgendamento(int $appointmentId): bool
{
    $url = "http://localhost:5156/api/appointments/{$appointmentId}/confirm";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_exec($ch);

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    return $httpCode === 204;
}
