<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 14/10/2018
 * Time: 18:02
 */

namespace PSP\Mixin;


use PSP\Mixin\Traits\BigCredit;
use PSP\Mixin\Traits\PayPalTransfer;

class IncomesManagerByPayPalTransferWithBigCredit extends IncomesManager
{
    public function __construct(IncomesCalculationService $ics, TaxesCalculationService $tcs, IncomesTransferService $its)
    {
        parent::__construct($ics, $tcs, $its);
    }

    use BigCredit;
    use PayPalTransfer;
}