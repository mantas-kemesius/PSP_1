<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 25/09/2018
 * Time: 07:54
 */

namespace PSP\Mixin;

use PSP\Mixin\Traits\Hourly;
use PSP\Mixin\Traits\PayPalTransfer;

class IncomesManagerByPaypalHourly extends IncomesManager
{
    public function __construct(IncomesCalculationService $ics, TaxesCalculationService $tcs, IncomesTransferService $its)
    {
        parent::__construct($ics, $tcs, $its);
    }

    use PayPalTransfer;
    use Hourly;
}