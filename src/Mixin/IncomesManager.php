<?php
namespace PSP\Mixin;

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
        $incomes = $this->calculateIncomes($this->ics);
        if ($this->checkIfSufficient($this->its, $incomes))
        {
            printf("There is enough money\n");
            $afterTaxes = $this->calculateAmountAfterTaxes($this->tcs, $incomes);
            if ($afterTaxes != 0)
            {
                $this->pay($this->its, $afterTaxes);
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

    protected abstract function checkIfSufficient(IncomesTransferService $its, float $amount): bool;
    protected abstract function calculateAmountAfterTaxes(TaxesCalculationService $tcs, float $amount): float;
    protected abstract function pay(IncomesTransferService $its, float $amount);
    protected abstract function calculateIncomes(IncomesCalculationService $ics): float;
}