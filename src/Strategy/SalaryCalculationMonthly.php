<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 24/09/2018
 * Time: 16:46
 */

namespace PSP\Strategy;


use PSP\Users\Employee;

class SalaryCalculationMonthly implements SalaryCalculation
{
    public function calculateBase(Employee $e)
    {
        return $e->getMonthSalary();
    }

    public function calculateBonus(float $basePayment, Employee $e)
    {
        $hourlyPay =  $basePayment / 40;
        if ($e->getPosition() == Employee::POSITIONS[2])
        {
            $hourlyPay += 5;
        }
        else if ($e->getPosition() == Employee::POSITIONS[1])
        {
            $hourlyPay += 3;
        }
        else
        {
            $hourlyPay += 2;
        }
        return $hourlyPay * $e->getBonusHours();
    }
}