<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 14/10/2018
 * Time: 22:26
 */

namespace PSP\ThirdPart\Mixin;


trait Engine
{
    private $engineStatus;

    public function getEngineStatus()
    {
        return $this->engineStatus;
    }

    public function printEngineStatus()
    {
        printf("Engine status: ".$this->engineStatus."\n");
    }

    public function turnOnEngine()
    {
        $this->engineStatus = true;
    }

    public function turnOfEngine()
    {
        $this->engineStatus = false;
    }
}