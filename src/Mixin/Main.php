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
        $ibanUser = new Employee("Petras", "LT165165165");
        $ibanUser->setWorkingHours(40);
        $ibanUser->setMonthSalary(12);
        $ibanUser->setBonusHours(8);
        $ibanUser->setPosition(Employee::POSITIONS[0]);
        $ibanUser->setBalance(1000);

        /** money transactions for employee */
        $sm = new SalaryManagerByBankTransferHourly($ibanUser->getBalance(), new BalanceCalculationService(), new TaxesCalculationService(), new SalaryCalculationService());
        $pay = $sm->calculatePayment($ibanUser);
        $sm->doPayment($pay, $ibanUser);

        $cm = new SmallCredit();
        $cm->getCredit(900, $ibanUser);
//        $cm = new BigCredit();
//        $cm->getCredit(1000, $ibanUser);
        printf("\n\n".$ibanUser->getBalance()."\n\n");



//        $paypalUser = new Employee("Mantas", "", "mantas@gmail.com", "Lithuania");
//        $paypalUser->setWorkingHours(40);
//        $paypalUser->setMonthSalary(12);
//        $paypalUser->setBonusHours(8);
//        $paypalUser->setPosition(Employee::POSITIONS[0]);
//        $paypalUser->setBalance(1000);

//        /** money transactions for supplier */
//        $supplier = new Supplier("Jonas", "LT165324234165");
//        $supManager = new SupplierManager(new SalaryManagerByBankTransferMonthly(1000, new BalanceCalculationService(), new TaxesCalculationService(), new SalaryCalculationService()));
//        $supManager->doPayment(200, $supplier);
    }
}

new Main();