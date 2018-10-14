<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 07/10/2018
 * Time: 13:24
 */

namespace PSP\TemplateMethod;


use PSP\Users\Employee;

abstract class CreditManager
{
    protected $permissionToGetCredit;

    public function getCredit(float $amount, Employee $e)
    {
        $this->askForCredit($amount, $e);
        if($this->permissionToGetCredit){
            $this->payCredit($amount, $e);
        }
    }

    protected abstract function askForCredit(float $amount, Employee $e);

    protected function payCredit($amount, Employee $e)
    {
        $e->setBalance($e->getBalance()+$amount);
        printf("Credit: ".$amount." was transfer for Employee: ".$e->getName().".\n");
    }
}