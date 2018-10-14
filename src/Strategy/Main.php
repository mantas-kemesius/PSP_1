<?php

namespace PSP\Strategy;

use PSP\Users\Employee;

require_once __DIR__ . '/../../vendor/autoload.php';

class Main
{
    /**
     * Main constructor.
     */
    public function __construct()
    {
        $ibanUser = new Employee("Petras", "LT165165165");
        $ibanUser->setWorkingHours(160);
        $ibanUser->setMonthSalary(800);
        $ibanUser->setBonusHours(8);
        $ibanUser->setPosition(Employee::POSITIONS[0]);
        $ibanUser->setBalance(1000);
        $ibanUser->setCreditAmount(400);

        $incomes = new SalaryCalculationMonthly($ibanUser);
        $bank = new PaymentByBankTransfer($ibanUser);

        printf("Balance before: ".$ibanUser->getBalance()."\n\n");
        $incomesManager = new IncomesManager($bank, $incomes);
        $incomesManager->getIncomes();
        printf("Balance after: ".$ibanUser->getBalance()."\n\n");




//        $paypalUser = new Employee("Mantas", "", "mantas@gmail.com", "Lithuania");
//        $paypalUser->setWorkingHours(160);
//        $paypalUser->setMonthSalary(800);
//        $paypalUser->setBonusHours(8);
//        $paypalUser->setPosition(Employee::POSITIONS[0]);
//        $paypalUser->setBalance(1000);
//        $ibanUser->setCreditAmount(400);

    }
}

new Main();