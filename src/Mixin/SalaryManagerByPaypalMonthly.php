<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 25/09/2018
 * Time: 07:51
 */

namespace PSP\TemplateMethod;


use PSP\Users\Employee;
use PSP\Users\PersonWithBankAccount;

class SalaryManagerByPaypalMonthly extends SalaryManager
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

    protected function checkIfSufficient(float $amount): float //Overridable: protected override
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

    protected function calculateBase(Employee $e): float
    {
        return $this->scs->calculateMonthlyBase($e);
    }

    protected function calculateBonus(float $basePayment, Employee $e): float
    {
        return $this->scs->calculateMonthlyBonus($basePayment, $e);
    }

    public function getBalance()
    {
        return $this->paypalBalance;
    }
}