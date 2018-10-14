<?php
namespace PSP\Users;


class Employee
{
    const POSITIONS = ["Assistant", "Supervisor", "Manager"];

    private $position;
    private $bonusHours;
    private $monthSalary;
    private $workingHours;
    private $name;
    private $iban;
    private $paypalEmail;
    private $paypalCountry;
    private $balance;
    private $creditAmount;

    /**
     * Employee constructor.
     * @param string $name
     * @param string $iban
     * @param string $paypalEmail
     * @param string $paypalCountry
     */
    public function __construct(string $name = "", string $iban = "", string $paypalEmail = "", string $paypalCountry = "")
    {
        $this->name = $name;
        $this->iban = $iban;
        $this->paypalEmail = $paypalEmail;
        $this->paypalCountry = $paypalCountry;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    /**
     * @return int
     */
    public function getBonusHours(): int
    {
        return $this->bonusHours;
    }

    /**
     * @param int $bonusHours
     */
    public function setBonusHours(int $bonusHours): void
    {
        $this->bonusHours = $bonusHours;
    }

    /**
     * @return float
     */
    public function getMonthSalary(): float
    {
        return $this->monthSalary;
    }

    /**
     * @param float $monthSalary
     */
    public function setMonthSalary(float $monthSalary): void
    {
        $this->monthSalary = $monthSalary;
    }

    /**
     * @return int
     */
    public function getWorkingHours(): int
    {
        return $this->workingHours;
    }

    /**
     * @param int $workingHours
     */
    public function setWorkingHours(int $workingHours): void
    {
        $this->workingHours = $workingHours;
    }

    public function setBalance(float $balance)
    {
        $this->balance = $balance;

        return $this;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @return mixed
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Employee
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIban(): string
    {
        return $this->iban;
    }

    /**
     * @param string $iban
     * @return Employee
     */
    public function setIban(string $iban)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaypalEmail(): string
    {
        return $this->paypalEmail;
    }

    /**
     * @param mixed $paypalEmail
     */
    public function setPaypalEmail(string $paypalEmail)
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

    /**
     * @return mixed
     */
    public function getCreditAmount()
    {
        return $this->creditAmount;
    }

    /**
     * @param mixed $creditAmount
     */
    public function setCreditAmount($creditAmount): void
    {
        $this->creditAmount = $creditAmount;
    }
}