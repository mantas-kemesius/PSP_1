<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 25/09/2018
 * Time: 06:54
 */

namespace PSP\TemplateMethod;


use PSP\Users\Employee;

class IncomesManagerByBankTransferHourly extends IncomesManager
{
    public function __construct(IncomesCalculationService $ics, TaxesCalculationService $tcs, IncomesTransferService $its)
    {
        parent::__construct($ics, $tcs, $its);
    }

    protected function checkIfSufficient(float $amount): bool
    {
        return $this->its->isAmountSufficientInBankAccount($amount);
    }

    protected function calculateAmountAfterTaxes(float $amount): float
    {
        return $this->tcs->calculateAmountAfterTaxesBank($amount);
    }

    protected function pay(float $amount)
    {
        $this->its->payByBank($amount);
    }

    protected function calculateIncomes(): float
    {
        return $this->ics->calculateIncomesHourly();
    }
}