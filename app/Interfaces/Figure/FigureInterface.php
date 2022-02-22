<?php

namespace App\Interfaces\Figure;

interface FigureInterface
{
    /**
     * @param $requestData
     * @return mixed
     */
    public function calculate($requestData);
}
