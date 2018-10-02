<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 24/09/2018
 * Time: 17:33
 */

namespace PSP\Strategy;


use PSP\Users\Supplier;

class SupplierManager
{
    public function __construct(Payment $ps)
    {
        $this->ps = $ps;
    }

    public function doPayment(float $amount, Supplier $s)
    {
        $this->ps->checkIfSufficient($amount);
        $this->ps->pay($amount, $s);
    }
}