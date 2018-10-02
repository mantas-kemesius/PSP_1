<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 23/09/2018
 * Time: 21:42
 */

namespace PSP\Strategy;

use PSP\Users\PersonWithBankAccount;

interface Payment
{
    public function checkIfSufficient(float $amount);
    public function calculateAmountWithTaxes(float $amount, PersonWithBankAccount $p);
    public function pay(float $amount, PersonWithBankAccount $p);
}