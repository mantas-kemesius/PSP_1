<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 25/09/2018
 * Time: 06:42
 */

namespace PSP\TemplateMethod;


use PSP\Users\Employee;
use PSP\Users\PersonWithBankAccount;

abstract class SalaryManager
{
    protected $bcs;
    protected $tcs;
    protected $scs;

    public function __construct(BalanceCalculationService $bcs, TaxesCalculationService $tcs, SalaryCalculationService $scs)
    {
        $this->bcs = $bcs;
        $this->tcs = $tcs;
        $this->scs = $scs;
    }

    public function doPayment(float $amount, PersonWithBankAccount $e)
    {
        if ($this->checkIfSufficient($amount))
        {
            printf("There is enough money\n");
            $withTaxes = $this->calculateAmountWithTaxes($amount, $e);
            if ($withTaxes != 0)
            {
                $this->pay($withTaxes, $e);
            }
            else
            {
                printf("No receiver info\n");
            }
        }
        else
        {
            printf("There is not enough money\n");
        }

    }

    protected abstract function checkIfSufficient(float $amount);
    protected abstract function calculateAmountWithTaxes(float $amount, PersonWithBankAccount $p);
    protected abstract function pay(float $amount, PersonWithBankAccount $e);
    //protected abstract function Notify(float $amount, PersonWithBankAccount $e);

    public function calculatePayment(Employee $e) : float
    {
        $baseP = $this->calculateBase($e);
        $total = $baseP + $this->calculateBonus($baseP, $e);
        printf("Calculated salary: ".$total."\n");
        return $total;
    }

    protected abstract function calculateBase(Employee $e): float;
    protected abstract function calculateBonus(float $basePayment, Employee $e): float;
    public abstract function getBalance();

}