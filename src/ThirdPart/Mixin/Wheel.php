<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 14/10/2018
 * Time: 22:26
 */

namespace PSP\ThirdPart\Mixin;

trait Wheel
{
    private $wheelPosition;

    public function turnLeft()
    {
        $this->wheelPosition = 'LEFT';
    }

    public function turnRight()
    {
        $this->wheelPosition = 'RIGHT';
    }

    public function turnForward()
    {
        $this->wheelPosition = 'CENTER';
    }

    public function getWheelPosition()
    {
        return $this->wheelPosition;
    }
}