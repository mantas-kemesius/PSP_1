<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 07/10/2018
 * Time: 13:23
 */

namespace PSP\TemplateMethod;


use PSP\Users\Employee;

class BigCredit extends CreditManager
{
    protected function askForCredit(float $amount, Employee $e)
    {
        if($amount >= 1000) {
            if ($e->getBalance() > $amount) {
                $this->permissionToGetCredit = true;
                printf("Employee: ".$e->getName()." can get credit.\n");
            }else{
                $this->permissionToGetCredit = false;
                printf("Employee: ".$e->getName()." can't get credit.\n");
            }
        }else{
            $this->permissionToGetCredit = false;
            printf("Credit amount is too small, should be at least: 1000e as a Big Credit\n");
        }
    }
}