<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 14/10/2018
 * Time: 17:54
 */

namespace PSP\TemplateMethod;


use PSP\Users\Employee;

class TaxesCalculationService
{
    private $e;

    public function __construct(Employee $e)
    {
        $this->e = $e;
    }

    public function calculateAmountAfterTaxesBank(float $incomes)
    {
        printf("Calculating taxes..\n");

        if ($this->e->getIban() == "")
        {
            return 0;
        }
        else if (substr($this->e->getIban(), 0, 2) != "LT")
        {
            $incomesAfterTaxes = $incomes - 20;
        }
        else
        {
            $incomesAfterTaxes = $incomes - 10;
        }

        return $incomesAfterTaxes;
    }

    /**
     * @param float $incomes
     * @return float|int
     */
    public function calculateAmountAfterTaxesPaypal(float $incomes)
    {
        printf("Calculating taxes..\n");
        $taxesPercent = 2.9;
        if ($this->e->getPaypalEmail() == "" || $this->e->getPaypalCountry() == "")
        {
            return 0;
        }
        else if ($this->e->getPaypalCountry() != "Lithuania")
        {
            $taxesPercent += 2;
        }
        return $incomes * 100 / (100 - $taxesPercent);
    }
}