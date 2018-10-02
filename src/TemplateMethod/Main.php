<?php

namespace PSP\TemplateMethod;

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
        $sm = new SalaryManagerByBankTransferHourly(1000, new BalanceCalculationService(), new TaxesCalculationService(), new SalaryCalculationService());
        $pay = $sm->calculatePayment($ibanUser);
        $sm->doPayment($pay, $ibanUser);

//        /** money transactions for supplier */
//        $supplier = new Supplier("Jonas", "LT165324234165");
//        $supManager = new SupplierManager(new SalaryManagerByBankTransferMonthly(1000, new BalanceCalculationService(), new TaxesCalculationService(), new SalaryCalculationService()));
//        $supManager->doPayment(200, $supplier);
    }
}

new Main();