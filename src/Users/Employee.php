<?php
namespace PSP\Users;


class Employee extends PersonWithBankAccount
{
    const POSITIONS = ["Assistant", "Supervisor", "Manager"];

    private $position;
    private $bonusHours;
    private $monthSalary;
    private $workingHours;

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
}