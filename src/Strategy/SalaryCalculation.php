<?php

namespace PSP\Strategy;

use PSP\Users\Employee;

interface SalaryCalculation
{
    public function calculateBase(Employee $e);
    public function calculateBonus(float $basePayment, Employee $e);
}