<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 24/09/2018
 * Time: 16:46
 */

namespace PSP\Strategy;


use PSP\Users\Employee;

class SalaryCalculationMonthly implements IncomeCalculation
{
    private $e;

    public function __construct(Employee $e)
    {
        $this->e = $e;
    }

    private function calculateFullSalary()
    {
        return $this->e->getMonthSalary() + $this->calculateBonus();
    }

    private function calculateBonus(): float
    {
        $hourlyPay =  $this->e->getMonthSalary() / $this->e->getWorkingHours();
        if ($this->e->getPosition() == Employee::POSITIONS[2])
        {
            $hourlyPay *= 5;
        }
        else if ($this->e->getPosition() == Employee::POSITIONS[1])
        {
            $hourlyPay *= 3;
        }
        else
        {
            $hourlyPay *= 2;
        }
        return $hourlyPay * $this->e->getBonusHours();
    }

    public function calculateIncome(): float
    {
        return $this->calculateFullSalary();
    }
}