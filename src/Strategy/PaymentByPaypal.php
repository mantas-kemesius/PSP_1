<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 24/09/2018
 * Time: 16:49
 */

namespace PSP\Strategy;

use PSP\Users\Employee;

class PaymentByPaypal implements Payment
{

    private $e;

    public function __construct(Employee $e)
    {
        $this->e = $e;
    }

    public function checkIfSufficient(float $incomes)
    {
        printf("Connecting to Paypal..\n");
        sleep(0.5);
        printf("Checking if incomes is bigger then 0..\n");
        if ($incomes > 0) {
            printf("Amount is sufficient..\n");
            return true;
        }
        else {
            printf("Is not possible to transfer this amount of money..\n");
            return false;
        }
    }

    public function calculateAmountAfterTaxes(float $incomes)
    {
        printf("Calculating taxes..\n");
        $taxesPercent = 2.9;
        if ($this->e->getPaypalEmail() == "" || $this->e->getPaypalCountry() == "")
        {
            return 0;
        }
        else if ($this->e->getPaypalCountry() != "Lithuania")
        {
            $taxesPercent += 2;
        }
        return $incomes * 100 / (100 - $taxesPercent);
    }

    public function pay(float $incomes)
    {
        printf($incomes." transfered to ".$this->e->getPaypalEmail()." account!\n");
        $this->e->setBalance($this->e->getBalance()+$incomes);
    }
}