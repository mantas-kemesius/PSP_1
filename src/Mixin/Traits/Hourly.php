<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 14/10/2018
 * Time: 19:33
 */

namespace PSP\Mixin\Traits;


use PSP\Mixin\IncomesCalculationService;

trait Hourly
{
    protected function calculateIncomes(IncomesCalculationService $ics): float
    {
        return $ics->calculateIncomesHourly();
    }
}