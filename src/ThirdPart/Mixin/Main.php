<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 14/10/2018
 * Time: 22:34
 */

namespace PSP\ThirdPart\Mixin;

require_once __DIR__ . '/../../../vendor/autoload.php';

class Main
{
    public function __construct()
    {
        $audi = new Audi("A4");
        $audi->increaseSpeedBy(10);
        $audi->turnLeft();
        $audi->printCurrentSpeed();
        $audi->printWheelPosition();
    }
}

new Main();