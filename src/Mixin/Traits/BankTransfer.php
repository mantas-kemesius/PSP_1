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

trait BankTransfer
{
    protected function checkIfSufficient(IncomesTransferService $its, float $amount): bool
    {
        return $its->isAmountSufficientInBankAccount($amount);
    }

    protected function calculateAmountAfterTaxes(TaxesCalculationService $tcs, float $amount): float
    {
        return $tcs->calculateAmountAfterTaxesBank($amount);
    }

    protected function pay(IncomesTransferService $its, float $amount)
    {
        $its->payByBank($amount);
    }
}