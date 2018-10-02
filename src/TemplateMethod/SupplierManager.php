<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 25/09/2018
 * Time: 07:57
 */

namespace PSP\TemplateMethod;


use PSP\Users\Supplier;

class SupplierManager
{
    private $sm;

    public function __construct(SalaryManager $sm)
    {
        $this->sm = $sm;
    }

    public function doPayment(float $amount, Supplier $s)
    {
        $this->sm->doPayment($amount, $s);
    }

    //public function checkIfSufficient(float $amount);
    //public function pay(float $amount, Supplier $s);
    //public function notify(float $amount, Supplier $s);
}