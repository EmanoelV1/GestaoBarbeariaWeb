<?php


class Product
{
    public int $id;
    public string $name;
    public float $salePrice;
    public float $unitCost;
    public int $quantity;
    public int $minimunStock;
    public DateTime $createdAt;
    public ?DateTime $updatedAt = null;

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
