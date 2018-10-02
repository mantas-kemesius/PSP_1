<?php

namespace PSP\Strategy;

use PSP\Users\Employee;
use PSP\Users\Supplier;

require_once __DIR__ . '/../../vendor/autoload.php';

class Main
{
    /**
     * Main constructor.
     */
    public function __construct()
    {
        $paypalUser = new Employee("Mantas", "", "mantas@gmail.com", "Lithuania");
        $paypalUser->setWorkingHours(40);
        $paypalUser->setMonthSalary(12);
        $paypalUser->setBonusHours(8);
        $paypalUser->setPosition(Employee::POSITIONS[0]);

        $ibanUser = new Employee("Petras", "LT165165165");
        $ibanUser->setWorkingHours(40);
        $ibanUser->setMonthSalary(12);
        $ibanUser->setBonusHours(8);
        $ibanUser->setPosition(Employee::POSITIONS[0]);

        /** money transactions for employee */
        $sm = new SalaryManager(new PaymentByPaypal(1000), new SalaryCalculationHourly());
        $pay = $sm->calculateSalary($ibanUser);
        $sm->paySalary($pay, $ibanUser);


        /** money transactions for supplier */
//        $supplier = new Supplier("Jonas", "LT165324234165");
//        $supManager = new SupplierManager(new PaymentByBankTransfer(4000));
//        $supManager->doPayment(200, $supplier);
    }
}

new Main();