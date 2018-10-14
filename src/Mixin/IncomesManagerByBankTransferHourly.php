<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 25/09/2018
 * Time: 06:54
 */

namespace PSP\Mixin;


use PSP\Mixin\Traits\BankTransfer;
use PSP\Mixin\Traits\Hourly;

class IncomesManagerByBankTransferHourly extends IncomesManager
{
    public function __construct(IncomesCalculationService $ics, TaxesCalculationService $tcs, IncomesTransferService $its)
    {
        parent::__construct($ics, $tcs, $its);
    }

    use BankTransfer;
    use Hourly;
}