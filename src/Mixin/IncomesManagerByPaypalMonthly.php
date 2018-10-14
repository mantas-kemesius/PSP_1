<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 25/09/2018
 * Time: 07:51
 */

namespace PSP\Mixin;

use PSP\Mixin\Traits\Monthly;
use PSP\Mixin\Traits\PayPalTransfer;

class IncomesManagerByPaypalMonthly extends IncomesManager
{
    public function __construct(IncomesCalculationService $ics, TaxesCalculationService $tcs, IncomesTransferService $its)
    {
        parent::__construct($ics, $tcs, $its);
    }

    use PayPalTransfer;
    use Monthly;
}