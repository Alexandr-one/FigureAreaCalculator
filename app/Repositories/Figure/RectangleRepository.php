<?php

namespace App\Repositories\Figure;

use App\Classes\FigureTypesEnum;
use App\Interfaces\Figure\FigureInterface;
use Illuminate\Support\Arr;

class RectangleRepository implements FigureInterface
{
    /*
     * Calculate rectangle area
     */
    public function calculate($requestData)
    {
        return abs(Arr::get($requestData, 'x2') - Arr::get($requestData, 'x1'))
            * abs(Arr::get($requestData, 'y2') - Arr::get($requestData, 'y1'));
    }
}
