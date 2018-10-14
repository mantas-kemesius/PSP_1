<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 07/10/2018
 * Time: 13:23
 */

namespace PSP\TemplateMethod;


use PSP\Users\Employee;

class SmallCredit extends CreditManager
{
    public function askForCredit(float $amount, Employee $e)
    {
        if($amount >= 5 && $amount < 1000) {
            if ($e->getBalance() > $amount/2) {
                $this->permissionToGetCredit = true;
                printf("Employee: ".$e->getName()." can get credit.\n");
            }else{
                $this->permissionToGetCredit = false;
                printf("Employee: ".$e->getName()." can't get credit.\n");
            }
        }else{
            $this->permissionToGetCredit = false;
            printf("Credit amount is too small or too big, should be at least: 5e and less then: 1000e as a Small Credit\n");
        }
    }
}