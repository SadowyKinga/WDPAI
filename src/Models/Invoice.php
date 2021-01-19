<?php

class Invoice /*klasa z fakturami*/
{
    private $id_invoice;
    private $company_name;
    private $making_date;
    private $payment_date;
    private $bank_account;

    /*tworzymy konstruktor*/
    public function __construct(
        int $id_invoice,
        string $company_name,
        string $making_date,
        string $payment_date,
        string $bank_account)

    {
        $this->id_invoice=$id_invoice;
        $this->company_name= $company_name;
        $this->making_date= $making_date;
        $this->payment_date= $payment_date;
        $this->bank_account= $bank_account;
    }

   
    public function getIdInvoice() //definiujemy jaki typ będzie zwracany
    {
        return $this->id_invoice;
    }

    public function getComapyName()
    {
        return $this->company_name;
    }

    public function getMakingDate()
    {
        return $this->making_date;
    }

    public function getPaymentDate()
    {
        return $this->payment_date;
    }
    public function getInvoiceNumber()
    {
        return $this->invoice_number;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getBankAccount()
    {
        return $this->bank_account;
    }
}