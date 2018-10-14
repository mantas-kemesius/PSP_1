<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 14/10/2018
 * Time: 18:01
 */

namespace PSP\Mixin;


use PSP\Mixin\Traits\PayPalTransfer;
use PSP\Mixin\Traits\SmallCredit;

class IncomesManagerByPayPalTransferWithSmallCredit extends IncomesManager
{
    public function __construct(IncomesCalculationService $ics, TaxesCalculationService $tcs, IncomesTransferService $its)
    {
        parent::__construct($ics, $tcs, $its);
    }

    use PayPalTransfer;
    use SmallCredit;
}