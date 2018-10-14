<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 14/10/2018
 * Time: 22:20
 */

namespace PSP\ThirdPart\Mixin;


class Audi
{
    use Engine;
    use Speed;
    use Wheel;

    private $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
}