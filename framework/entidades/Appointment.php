<?php

require_once __DIR__ . '/../enums/enumeradores.php';

class Appointment
{
    public int $id;
    public DateTime $appointmentDateTime;
    public DateTime $appointmentEndDateTime;
    public ?int $clientId = null;
    public ?string $clientName = null;
    public ?string $clientPhone = null;
    public ?int $employeeId = null;
    public AppointmentStatus $status;
    public float $servicePrice;
    public PaymentType $paymentType;
    public ?DateTime $paidAt = null;
    public DateTime $createdAt;
    public DateTime $updatedAt;
    public string $observations = '';

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
