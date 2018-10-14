<?php

namespace PSP\Strategy;

use PSP\Users\Employee;

interface IncomeCalculation
{
    public function calculateIncome(): float;
}