<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 07/10/2018
 * Time: 16:06
 */

namespace PSP\Strategy;

use PSP\Users\Employee;

class SmallCredit implements IncomeCalculation
{
    private $e;

    /**
     * SmallCredit constructor.
     * @param Employee $e
     */
    public function __construct(Employee $e)
    {
        $this->e = $e;
    }

    public function checkIfSufficient()
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

    public function calculateIncome(): float
    {
        return ($this->checkIfSufficient())? $this->e->getCreditAmount(): 0;
    }
}