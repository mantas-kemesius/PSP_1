<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 07/10/2018
 * Time: 16:06
 */

namespace PSP\Strategy;

use PSP\Users\Employee;

class BigCredit implements IncomeCalculation
{
    private $e;

    /**
     * BigCredit constructor.
     * @param Employee $e
     */
    public function __construct(Employee $e)
    {
        $this->e = $e;
    }

    public function checkIfSufficient()
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

    public function calculateIncome(): float
    {
        return ($this->checkIfSufficient())? $this->e->getCreditAmount(): 0;
    }
}