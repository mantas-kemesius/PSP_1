<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 25/09/2018
 * Time: 07:54
 */

namespace PSP\TemplateMethod;

class IncomesManagerByPaypalHourly extends IncomesManager
{
    public function __construct(IncomesCalculationService $ics, TaxesCalculationService $tcs, IncomesTransferService $its)
    {
        parent::__construct($ics, $tcs, $its);
    }

    protected function checkIfSufficient(float $amount): bool
    {
        return $this->its->isAmountSufficientInPayPalAccount($amount);
    }

    protected function calculateAmountAfterTaxes(float $amount): float
    {
        return $this->tcs->calculateAmountAfterTaxesPaypal($amount);
    }

    protected function pay(float $amount)
    {
        $this->its->payByPaypal($amount);
    }

    protected function calculateIncomes(): float
    {
        return $this->ics->calculateIncomesHourly();
    }
}