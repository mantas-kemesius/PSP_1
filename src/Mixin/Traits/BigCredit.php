<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 14/10/2018
 * Time: 19:34
 */

namespace PSP\Mixin\Traits;

use PSP\Mixin\IncomesCalculationService;

trait BigCredit
{
    protected function calculateIncomes(IncomesCalculationService $ics): float
    {
        return $ics->calculateIncomesBigCredit();
    }
}