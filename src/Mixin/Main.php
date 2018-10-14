<?php

namespace PSP\Mixin;

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
        $ibanUser->setCreditAmount(1200);

        $paypalUser = new Employee("Mantas", "", "mantas@gmail.com", "Lithuania");
        $paypalUser->setWorkingHours(160);
        $paypalUser->setMonthSalary(800);
        $paypalUser->setBonusHours(8);
        $paypalUser->setPosition(Employee::POSITIONS[0]);
        $paypalUser->setBalance(1000);
        $paypalUser->setCreditAmount(1000);

        /** money transactions for employee */
        printf("Balance before: ".$paypalUser->getBalance()."\n\n");
        $incomesManager = new IncomesManagerByPaypalMonthly(new IncomesCalculationService($paypalUser), new TaxesCalculationService($paypalUser), new IncomesTransferService($paypalUser));
        $incomesManager->getIncomes();
        printf("Balance after: ".$paypalUser->getBalance()."\n\n");

//        printf("Balance before: ".$ibanUser->getBalance()."\n\n");
//        $incomesManager = new IncomesManagerByBankTransferWithBigCredit(new IncomesCalculationService($ibanUser), new TaxesCalculationService($ibanUser), new IncomesTransferService($ibanUser));
//        printf("Balance after: ".$ibanUser->getBalance()."\n\n");
    }
}

new Main();