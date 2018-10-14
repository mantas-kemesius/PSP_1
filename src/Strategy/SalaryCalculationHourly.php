<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 24/09/2018
 * Time: 16:46
 */

namespace PSP\Strategy;


use PSP\Users\Employee;

class SalaryCalculationHourly implements IncomeCalculation
{
    private $e;

    public function __construct(Employee $e)
    {
        $this->e = $e;
    }

    private function calculateFullSalary()
    {
        if ($this->e->getPosition() == Employee::POSITIONS[2])
        {
            $hourlyPay = 20;
        }
        else if ($this->e->getPosition() == Employee::POSITIONS[1])
        {
            $hourlyPay = 15;
        }
        else
        {
            $hourlyPay = 10;
        }

        return ($this->e->getWorkingHours() * $hourlyPay) + $this->calculateBonus();
    }

    private function calculateBonus()
    {
        if ($this->e->getPosition() == Employee::POSITIONS[2])
        {
            $hourlyPay = 25;
        }
        else if ($this->e->getPosition() == Employee::POSITIONS[1])
        {
            $hourlyPay = 18;
        }
        else
        {
            $hourlyPay = 12;
        }
        return $hourlyPay * $this->e->getBonusHours();
    }

    public function calculateIncome(): float
    {
        return $this->calculateFullSalary();
    }
}