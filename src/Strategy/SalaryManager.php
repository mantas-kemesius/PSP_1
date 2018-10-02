<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 23/09/2018
 * Time: 22:23
 */

namespace PSP\Strategy;


use PSP\Users\Employee;

class SalaryManager
{
    /** @var Payment $p */
    private $p;

    /** @var SalaryCalculation $sc */
    private $sc;

    public function __construct(Payment $p, SalaryCalculation $sc)
    {
        $this->p = $p;
        $this->sc = $sc;
    }

    /**
     * @param float $amount
     * @param Employee $e
     */
    public function PaySalary(float $amount, Employee $e)
    {
        printf("Without taxes: " .$amount."\n");
        if ($this->p->checkIfSufficient($amount))
        {
            printf("There is enough money\n");
            $withTaxes = $this->p->calculateAmountWithTaxes($amount, $e);

            if ($withTaxes != 0) {
                $this->p->pay($withTaxes, $e);
            } else {
                printf("No receiver info\n");
            }
        } else {
            printf("There is not enough money\n");
        }
    }

    /**
     * @param Employee $e
     * @return float
     */
    public function CalculateSalary(Employee $e) : float
    {
        $baseP = $this->sc->calculateBase($e);
        $total = $baseP + $this->sc->calculateBonus($baseP, $e);
        printf("Calculated salary: ".$total."\n");
        return $total;
    }
}