<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 24/09/2018
 * Time: 16:46
 */

namespace PSP\Strategy;


use PSP\Users\PersonWithBankAccount;

class PaymentByBankTransfer implements Payment
{
    private $bankBalance;

    /**
     * PaymentByBankTransfer constructor.
     * @param float $bankBalance
     */
    public function __construct(float $bankBalance)
    {
        $this->bankBalance = $bankBalance;
    }

    /**
     * @param float $amount
     * @return bool
     */
    public function checkIfSufficient(float $amount) : bool
    {
        printf("Connecting to bank..\n");
        sleep(0.5);
        printf("Checking if there is enough money in bank account..\n");
        if ($this->bankBalance > $amount) return true;
        else return false;
    }

    public function calculateAmountWithTaxes(float $amount, PersonWithBankAccount $p)
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

    public function pay(float $amount, PersonWithBankAccount $p)
    {
        printf($amount." transfered to ".$p->getIban()."\n");
    }
}