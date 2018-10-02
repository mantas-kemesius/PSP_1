<?php
namespace PSP\Users;


class Supplier extends PersonWithBankAccount
{
    /**
     * Employee constructor.
     * @param string $name
     * @param string $iban
     * @param string $paypalEmail
     * @param string $paypalCountry
     */
    public function __construct(string $name = "", string $iban = "", string $paypalEmail = "", string $paypalCountry = "")
    {
        parent::__construct($name, $iban, $paypalEmail, $paypalCountry);
    }
}