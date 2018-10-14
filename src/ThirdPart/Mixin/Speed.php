<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 14/10/2018
 * Time: 22:25
 */

namespace PSP\ThirdPart\Mixin;


trait Speed
{
    private $speed;

    public function increaseSpeedBy($speed)
    {
        $this->speed += $speed;
    }

    public function decreaseSpeedBy($speed)
    {
        if($speed > $this->speed)
        {
            $this->speed = 0;
        }else{
            $this->speed -= $speed;
        }
    }

    public function getCurrentSpeed()
    {
        return $this->speed;
    }


    public function printCurrentSpeed()
    {
        printf("Current speed: ".$this->speed."\n");
    }
}