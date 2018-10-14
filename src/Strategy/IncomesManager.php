<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 23/09/2018
 * Time: 22:23
 */

namespace PSP\Strategy;


class IncomesManager
{
    /** @var Payment $p */
    private $p;

    /** @var IncomeCalculation $sc */
    private $ic;

    public function __construct(Payment $p, IncomeCalculation $ic)
    {
        $this->p = $p;
        $this->ic = $ic;
    }

    public function getIncomes()
    {
        $incomes = $this->ic->calculateIncome();
        if ($this->p->checkIfSufficient($incomes))
        {
            $afterTaxes = $this->p->calculateAmountAfterTaxes($incomes);

            if ($afterTaxes > 0) {
                $this->p->pay($afterTaxes);
            }
        }
    }
}