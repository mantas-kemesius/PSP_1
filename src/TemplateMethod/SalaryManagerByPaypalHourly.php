<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 25/09/2018
 * Time: 07:54
 */

namespace PSP\TemplateMethod;


use PSP\Users\Employee;
use PSP\Users\PersonWithBankAccount;

class SalaryManagerByPaypalHourly extends SalaryManager
{
    private $paypalBalance;

    /**
     * SalaryManagerByBankTransferHourly constructor.
     * @param float $paypalBalance
     * @param BalanceCalculationService $bcs
     * @param TaxesCalculationService $tcs
     * @param SalaryCalculationService $scs
     */
    public function __construct(float $paypalBalance, BalanceCalculationService $bcs, TaxesCalculationService $tcs, SalaryCalculationService $scs)
    {
        parent::__construct($bcs, $tcs, $scs);
        $this->paypalBalance = $paypalBalance;
    }

    protected function CheckIfSufficient(float $amount): float //Overridable: protected override
    {
        return $this->bcs->isEnoughInPaypalAccount($this->paypalBalance, $amount);
    }

    protected function calculateAmountWithTaxes(float $amount, PersonWithBankAccount $p): float
    {
        return $this->tcs->calculateAmountWithTaxesPaypal($amount, $p);
    }

    protected function pay(float $amount, PersonWithBankAccount $e)
    {
        $this->bcs->payByPaypal($this->paypalBalance, $amount, $e);
    }

    /*
    protected override void Notify(double amount, PersonWithBankAccount e)
    {
        printf($e->getName()." was informed. \n");
    }
    */

    protected function calculateBase(Employee $e): float
    {
        return $this->scs->calculateHourlyBase($e);
    }

    protected function calculateBonus(float $basePayment, Employee $e): float
    {
        return $this->scs->calculateHourlyBonus($basePayment, $e);
    }
}