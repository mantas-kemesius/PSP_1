<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 14/10/2018
 * Time: 17:53
 */

namespace PSP\Mixin;


use PSP\Users\Employee;

class IncomesCalculationService
{
    private $e;

    public function __construct(Employee $e)
    {
        $this->e = $e;
    }

    /** --------------------- Monthly ---------------- */

    public function calculateIncomesMonthly()
    {
        return $this->calculateFullMonthlySalary();
    }

    private function calculateFullMonthlySalary()
    {
        return $this->e->getMonthSalary() + $this->calculateMonthlyBonus();
    }

    private function calculateMonthlyBonus(): float
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

    /** --------------------- HOURLY ---------------- */
    public function calculateIncomesHourly()
    {
        return $this->calculateFullHourlySalary();
    }

    private function calculateFullHourlySalary()
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

        return ($this->e->getWorkingHours() * $hourlyPay) + $this->calculateHourlyBonus();
    }

    private function calculateHourlyBonus()
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

    /** --------------------- WITH SMALL CREDIT ---------------- */

    public function calculateIncomesSmallCredit()
    {
        return ($this->checkIfSmallCreditSufficient())? $this->e->getCreditAmount(): 0;
    }

    public function checkIfSmallCreditSufficient()
    {
        if($this->e->getCreditAmount() >= 5 && $this->e->getCreditAmount() < 1000) {
            if ($this->e->getBalance() > $this->e->getCreditAmount()/2) {
                $permissionToGetCredit = true;
                printf("Employee: can get credit.\n");
            }else{
                $permissionToGetCredit = false;
                printf("Employee: can't get credit.\n");
            }
        }else{
            $permissionToGetCredit = false;
            printf("Credit amount is too small or too big, should be at least: 5e and less then: 1000e as a Small Credit\n");
        }

        return $permissionToGetCredit;
    }


    /** --------------------- WITH BIG CREDIT ---------------- */

    public function calculateIncomesBigCredit()
    {
        return ($this->checkIfBigCreditSufficient())? $this->e->getCreditAmount(): 0;
    }

    public function checkIfBigCreditSufficient()
    {
        if($this->e->getCreditAmount() >= 1000) {
            if ($this->e->getBalance() > $this->e->getCreditAmount()/2) {
                $permissionToGetCredit = true;
                printf("Employee: ".$this->e->getName()." can get credit.\n");
            }else{
                $permissionToGetCredit = false;
                printf("Employee: ".$this->e->getName()." can't get credit.\n");
            }
        }else{
            $permissionToGetCredit = false;
            printf("Credit amount is too small, should be at least: 1000e as a Big Credit\n");
        }

        return $permissionToGetCredit;
    }
}