<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 23/09/2018
 * Time: 21:50
 */

namespace PSP\Users;


abstract class PersonWithBankAccount
{
    private $name;
    private $iban;
    private $paypalEmail;
    private $paypalCountry;

    /**
     * @param string $name
     * @param string $iban
     * @param string $paypalEmail
     * @param string $paypalCountry
     * @return string
     */
    public function __construct(string $name, string $iban = "", string $paypalEmail = "" , string $paypalCountry = "")
    {
        $this->name = $name;
        $this->iban = $iban;
        $this->paypalEmail = $paypalEmail;
        $this->paypalCountry = $paypalCountry;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param mixed $iban
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
    }

    /**
     * @return mixed
     */
    public function getPaypalEmail()
    {
        return $this->paypalEmail;
    }

    /**
     * @param mixed $paypalEmail
     */
    public function setPaypalEmail($paypalEmail)
    {
        $this->paypalEmail = $paypalEmail;
    }

    /**
     * @return mixed
     */
    public function getPaypalCountry()
    {
        return $this->paypalCountry;
    }

    /**
     * @param mixed $paypalCountry
     */
    public function setPaypalCountry($paypalCountry)
    {
        $this->paypalCountry = $paypalCountry;
    }


}