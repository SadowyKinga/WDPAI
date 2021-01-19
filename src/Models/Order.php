<?php

class Order /*klasa z zamówieniami*/
{
    private $name;
    private $shop_name;
    private $making_date;
    private $delivery_date;
    private $name_surname;

    /*tworzymy konstruktor*/
    public function __construct(
        int $id_order,
        string $name,
        string $shop_name,
        string $making_date,
        string $delivery_date,
        string $name_surname)

    {
        $this->id_order = $id_order;
        $this->name = $name;
        $this->shop_name = $shop_name;
        $this->making_date = $making_date;
        $this->delivery_date = $delivery_date;
        $this->name_surname = $name_surname;
    }

    /*utworzenie getterów i tworzenie setterów*/
    public function getOrderId(): int 
    {
        if(isset($this->id_order)) {
            return $this->id_order;
        }
        return 0;
    }
    
    public function getCompanyName(): string
    {   
        if(isset($this->name)) {
            return $this->name;
        }
        return "";
    }

    public function getShopName(): string
    {
        if(isset($this->shop_name)) {
            return $this->shop_name;
        }
        return "";
    }

    public function getMakingDate(): string
    {
        if(isset($this->making_date)) {
            return $this->making_date;
        }
        return "";
    }

    public function getDeliveryDate(): string
    {
        if(isset($this->delivery_date)) {
            return $this->delivery_date;
        }
        return "";
    }

    public function getWorkerName(): string
    {
        if(isset($this->name_surname)) {
            return $this->name_surname;
        }
        return "";
    }
}