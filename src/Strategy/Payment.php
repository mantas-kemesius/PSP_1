<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 23/09/2018
 * Time: 21:42
 */

namespace PSP\Strategy;

use PSP\Users\Employee;
use PSP\Users\PersonWithBankAccount;

interface Payment
{
    public function checkIfSufficient(float $amount);
    public function calculateAmountAfterTaxes(float $amount);
    public function pay(float $amount);
}