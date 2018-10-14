<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 14/10/2018
 * Time: 19:32
 */

namespace PSP\Mixin\Traits;


use PSP\Mixin\IncomesTransferService;
use PSP\Mixin\TaxesCalculationService;

trait PayPalTransfer
{
    protected function checkIfSufficient(IncomesTransferService $its, float $amount): bool
    {
        return $its->isAmountSufficientInPayPalAccount($amount);
    }

    protected function calculateAmountAfterTaxes(TaxesCalculationService $tcs, float $amount): float
    {
        return $tcs->calculateAmountAfterTaxesPaypal($amount);
    }

    protected function pay(IncomesTransferService $its, float $amount)
    {
        $its->payByPaypal($amount);
    }
}