<?php
namespace PSP\TemplateMethod;

abstract class IncomesManager
{
    protected $ics;
    protected $tcs;
    protected $its;

    public function __construct(IncomesCalculationService $ics, TaxesCalculationService $tcs, IncomesTransferService $its)
    {
        $this->ics = $ics;
        $this->tcs = $tcs;
        $this->its = $its;
    }

    public function getIncomes()
    {
        $incomes = $this->calculateIncomes();
        if ($this->checkIfSufficient($incomes))
        {
            printf("There is enough money\n");
            $afterTaxes = $this->calculateAmountAfterTaxes($incomes);
            if ($afterTaxes != 0)
            {
                $this->pay($afterTaxes);
            }
            else
            {
                printf("Is not possible to transfer this amount of money!\n");
            }
        }
        else
        {
            printf("There is not enough money\n");
        }

    }

    protected abstract function checkIfSufficient(float $amount): bool;
    protected abstract function calculateAmountAfterTaxes(float $amount): float;
    protected abstract function pay(float $amount);
    protected abstract function calculateIncomes(): float;
}