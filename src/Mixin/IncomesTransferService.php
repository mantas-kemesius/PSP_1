<?php
namespace PSP\Mixin;

use PSP\Users\Employee;

class IncomesTransferService
{
    private $e;

    public function __construct(Employee $e)
    {
        $this->e = $e;
    }

    public function isAmountSufficientInPayPalAccount(float $incomes): bool
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
    public function isAmountSufficientInBankAccount(float $incomes): bool
    {
        printf("Connecting to bank...\n");
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

    public function payByBank(float $amount)
    {
        $this->e->setBalance($this->e->getBalance()+$amount);
        printf($amount ." transfered to ". $this->e->getIban()."\n");
    }

    public function payByPaypal(float $amount)
    {
        $this->e->setBalance($this->e->getBalance() + $amount);
        printf($amount . " transfered to " . $this->e->getPaypalEmail()." account!\n");
    }
}

