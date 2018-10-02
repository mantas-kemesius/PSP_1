<?php
namespace PSP\TemplateMethod;

use PSP\Users\Employee;
use PSP\Users\PersonWithBankAccount;

class BalanceCalculationService
{
    public function isEnoughInPaypalAccount(float $paypalBalance, float $amount): bool
    {
        printf("Connecting to Paypal..\n");
        sleep(1);
        printf("Checking if there is enough money in Paypal account..\n");
        if ($paypalBalance > $amount) return true;
        else return false;
    }
    public function isEnoughInBankAccount(float $bankBalance, float $amount): bool
    {
        printf("Connecting to bank...\n");
        sleep(1);
        printf("Checking if there is enough money in bank account.\n");
        if ($bankBalance > $amount) return true;
        else return false;
    }

    public function payByBank(float &$bankBalance, float $amount, PersonWithBankAccount $e)
    {
        $bankBalance -= $amount;
        printf($amount ." transfered to ". $e->getIban()."\n");
    }

    public function payByPaypal(float &$paypalBalance, float $amount, PersonWithBankAccount $e)
    {
        $paypalBalance -= $amount;
        printf($amount . " transfered " . $e->getPaypalEmail()."\n");
    }
}

class TaxesCalculationService
{
    public function calculateAmountWithTaxesBank(float $amount, PersonWithBankAccount $p)
    {
        printf("Calculating taxes..\n");
        $withTaxes = $amount;
        if ($p->getIban() == "")
        {
            return 0;
        }
        else if (substr($p->getIban(), 0, 2) != "LT")
        {
            $withTaxes += 20;
        }
        else
        {
            $withTaxes += 1;
        }
        return $withTaxes;
    }
    public function calculateAmountWithTaxesPaypal(float $amount, PersonWithBankAccount $p)
    {
        printf("Calculating taxes..\n");
        $taxesPercent = 2.9;
        if ($p->getPaypalEmail() == "" || $p->getPaypalCountry() == "")
        {
            return 0;
        }
        else if ($p->getPaypalCountry() != "Lithuania")
        {
            $taxesPercent += 2;
        }

        return $amount * 100 / (100 - $taxesPercent);
    }
}

class SalaryCalculationService
{
    public function calculateHourlyBase(Employee $e)
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

    public function calculateHourlyBonus(float $basePayment, Employee $e)
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

    public function calculateMonthlyBase(Employee $e)
    {
        return $e->getMonthSalary();
    }

    public function calculateMonthlyBonus(float $basePayment, Employee $e)
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