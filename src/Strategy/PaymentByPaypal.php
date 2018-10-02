<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 24/09/2018
 * Time: 16:49
 */

namespace PSP\Strategy;


use PSP\Users\PersonWithBankAccount;

class PaymentByPaypal implements Payment
{

    private $paypalBalance;

    public function __construct(float $paypalBalance)
    {
        $this->paypalBalance = $paypalBalance;
    }

    public function checkIfSufficient(float $amount)
    {
        printf("Connecting to Paypal..\n");
        sleep(1);
        printf("Checking if there is enough money in Paypal account..\n");
        if ($this->paypalBalance > $amount) return true;
        else return false;
    }

    public function calculateAmountWithTaxes(float $amount, PersonWithBankAccount $p)
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

    public function pay(float $amount, PersonWithBankAccount $p)
    {
        printf($amount." transfered to ".$p->getPaypalEmail()."\n");
    }
}