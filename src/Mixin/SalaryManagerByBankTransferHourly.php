<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 25/09/2018
 * Time: 06:54
 */

namespace PSP\TemplateMethod;


use PSP\Users\Employee;
use PSP\Users\PersonWithBankAccount;

class SalaryManagerByBankTransferHourly extends SalaryManager
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

    protected function checkIfSufficient(float $amount): float //Overridable: protected override
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
        Console.WriteLine(e.Name + " was informed.");
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

    public function getBalance()
    {
        return $this->bankBalance;
    }
}