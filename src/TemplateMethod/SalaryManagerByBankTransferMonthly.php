<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 25/09/2018
 * Time: 07:48
 */

namespace PSP\TemplateMethod;


use PSP\Users\Employee;
use PSP\Users\PersonWithBankAccount;

class SalaryManagerByBankTransferMonthly extends SalaryManager
{
    private $bankBalance;

    /**
     * SalaryManagerByBankTransferHourly constructor.
     * @param float $bankBalance
     * @param BalanceCalculationService $bcs
     * @param TaxesCalculationService $tcs
     * @param SalaryCalculationService $scs
     */
    public function __construct(float $bankBalance, BalanceCalculationService $bcs, TaxesCalculationService $tcs, SalaryCalculationService $scs)
    {
        parent::__construct($bcs, $tcs, $scs);
        $this->bankBalance = $bankBalance;
    }

    protected function CheckIfSufficient(float $amount): float //Overridable: protected override
    {
        return $this->bcs->isEnoughInBankAccount($this->bankBalance, $amount);
    }

    protected function calculateAmountWithTaxes(float $amount, PersonWithBankAccount $p): float
    {
        return $this->tcs->calculateAmountWithTaxesBank($amount, $p);
    }

    protected function pay(float $amount, PersonWithBankAccount $e)
    {
        $this->bcs->payByBank($this->bankBalance, $amount, $e);
    }

    /*
    protected override void Notify(double amount, PersonWithBankAccount e)
    {
        printf($e->getName()." was informed. \n");
    }
    */

    protected function calculateBase(Employee $e): float
    {
        return $this->scs->calculateMonthlyBase($e);
    }

    protected function calculateBonus(float $basePayment, Employee $e): float
    {
        return $this->scs->calculateMonthlyBonus($basePayment, $e);
    }
}