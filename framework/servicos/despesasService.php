<?php
require_once __DIR__ . '/../enums/enumeradores.php';
require_once __DIR__ . '/../entidades/Expense.php';

// Métodos utilitários para mapeamento da resposta do endpoint e conversão
// Para a aplicação php

function mapearStatusDespesa(string $statusStr): ExpenseStatus
{
    return match (strtolower($statusStr)) {
        '1' => ExpenseStatus::Paid,
        '2' => ExpenseStatus::Pending,
        '3' => ExpenseStatus::Scheduled,
        '4' => ExpenseStatus::Overdue,
        '5' => ExpenseStatus::InstallmentsRemaining,

        default => ExpenseStatus::Pending,
    };
}

function mapearTipo(string $recurrence): Recurrence
{
    return match (strtolower($recurrence)) {
        '1' => Recurrence::Single,
        '2' => Recurrence::Installments,

        default => Recurrence::Single,
    };
}

function mapearJsonParaEntidadeDespesa(array $data): Expense
{
    $expense = new Expense();

    $expense->id = $data['id'] ?? 0;
    $expense->notes = $data['notes'] ?? null;
    $expense->recurrence = isset($data['recurrence']) ? mapearTipo($data['recurrence']): Recurrence::Single;
    $expense->amount = $data['amount'] ?? 0.0;
    $expense->status = isset($data['status']) ? mapearStatusDespesa($data['recurrence']): ExpenseStatus::Pending;
    $expense->totalInstallments = $data['totalInstallments'] ?? 0;
    $expense->paidInstallments = $data['paidInstallments'] ?? 0;
    $expense->dueDate = new DateTime($data['dueDate']) ?? null;

    return $expense;
}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// Carrega os agendamentos realizando uma requisição GET
// para o endpoint de agendamentos e devolve paginado 

function carregarDespesas(int $page, int $itemsPerPage): array
{
    $apiUrl = 'http://localhost:5156/api/expenses';
    $responseJson = file_get_contents($apiUrl);
    if ($responseJson === false) {
        die('Erro ao acessar a API de Despesas.');
    }
    $responseData = json_decode($responseJson, true);
    if ($responseData === null) {
        die('Erro ao decodificar resposta JSON da API.');
    }

    $expensasArray = $responseData['expenses'] ?? [];
    $expenses = [];
    foreach ($expensasArray as $data) {
        $expenses[] = mapearJsonParaEntidadeDespesa($data);
    }

    $totalItems = count($expenses);
    $totalPages = (int)ceil($totalItems / $itemsPerPage);
    $startIndex = ($page - 1) * $itemsPerPage;
    $expensesPage = array_slice($expenses, $startIndex, $itemsPerPage);

    return [
        'expenses' => $expensesPage,
        'totalItems' => $totalItems,
        'totalPages' => $totalPages,
    ];
}


