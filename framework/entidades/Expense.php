<?php

require_once __DIR__ . '/../enums/enumeradores.php';

class Expense
{
    public int $id;
    public DateTime $dueDate;
    public ?DateTime $paymentDate = null;
    public float $amount;
    public ?float $paidAmount = null;
    public ?float $amountOfInstallment = null;
    public ExpenseStatus $status;
    public ?string $supplier = null;
    public ?string $notes = '';
    public Recurrence $recurrence;
    public ?int $totalInstallments = 0;
    public ?int $paidInstallments = 0;

    // Método que recupera os atributos da classe
    public function obterArrayAtributos()
    {
        $array = array();

        foreach ($this as $key => $value) {
            if (property_exists($this, $key)) {
                $array[$key] = $value;
            }
        }
        return $array;
    }
}
