<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 24/09/2018
 * Time: 16:46
 */

namespace PSP\Strategy;

use PSP\Users\Employee;

class PaymentByBankTransfer implements Payment
{
    private $e;

    /**
     * PaymentByBankTransfer constructor.
     * @param Employee $e
     */
    public function __construct(Employee $e)
    {
        $this->e = $e;
    }

    /**
     * @param float $incomes
     * @return bool
     */
    public function checkIfSufficient(float $incomes) : bool
    {
        printf("Connecting to bank..\n");
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

    /**
     * @param float $incomes
     * @return float|int
     */
    public function calculateAmountAfterTaxes(float $incomes)
    {
        printf("Calculating taxes..\n");

        if ($this->e->getIban() == "")
        {
            return 0;
        }
        else if (substr($this->e->getIban(), 0, 2) != "LT")
        {
            $incomesAfterTaxes = $incomes - 20;
        }
        else
        {
            $incomesAfterTaxes = $incomes - 10;
        }

        return $incomesAfterTaxes;
    }

    public function pay(float $incomes)
    {
        printf($incomes." transfered to ".$this->e->getIban()." account!\n");
        $this->e->setBalance($this->e->getBalance()+$incomes);
    }

}