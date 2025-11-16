<?php

// Enumerador referente a um agendamento dentro do sistema
enum AppointmentStatus: int
{
    case Pending = 1;
    case Confirmed = 2;
    case Completed = 3;

    public function getDescription(): string
    {
        return match ($this) {
            self::Pending => "Aguardando confirmação",
            self::Confirmed => "Agendamento confirmado",
            self::Completed => "Atendimento concluído",
        };
    }
}

// Enumerador referente ao tipo de pagamento de um serviço ou produto na barbearia
enum PaymentType: int
{
    case CreditCard = 1;
    case DebitCard = 2;
    case Cash = 3;
    case Pix = 4;
    case Other = 5;

    public function getDescription(): string
    {
        return match ($this) {
            PaymentType::CreditCard => "Cartão de Crédito",
            PaymentType::DebitCard => "Cartão de Débito",
            PaymentType::Cash => "Dinheiro",
            PaymentType::Pix => "Pix",
            PaymentType::Other => "Outro",
        };
    }
}

enum Recurrence: int
{
    case Single = 1;
    case Installments = 2;

    public function getDescription(): string
    {
        return match ($this) {
            Recurrence::Single => "Despesa única",
            Recurrence::Installments => "Despesa parcelada",
        };
    }
}

enum ExpenseStatus: int
{
    case Paid = 1;
    case Pending = 2;
    case Scheduled = 3;
    case Overdue = 4;
    case InstallmentsRemaining = 5;

    public function getDescription(): string
    {
        return match ($this) {
            ExpenseStatus::Paid => "Paga",
            ExpenseStatus::Pending => "Pendente de pagamento",
            ExpenseStatus::Scheduled => "Pagamento agendado",
            ExpenseStatus::Overdue => "Pagamento atrasado",
            ExpenseStatus::InstallmentsRemaining => "Faltam parcelas",
        };
    }
}

