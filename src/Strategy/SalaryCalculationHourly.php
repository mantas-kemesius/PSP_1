<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 24/09/2018
 * Time: 16:46
 */

namespace PSP\Strategy;


use PSP\Users\Employee;

class SalaryCalculationHourly implements SalaryCalculation
{
    public function calculateBase(Employee $e)
    {
        $hourlyPay = 0;
        if ($e->getPosition() == Employee::POSITIONS[2])
        {
            $hourlyPay = 20;
        }
        else if ($e->getPosition() == Employee::POSITIONS[1])
        {
            $hourlyPay = 15;
        }
        else
        {
            $hourlyPay = 10;
        }
        return $hourlyPay * $e->getWorkingHours();
    }

    public function calculateBonus(float $basePayment, Employee $e)
    {
        $hourlyPay = $basePayment / $e->getWorkingHours();
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