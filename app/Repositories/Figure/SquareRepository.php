<?php

namespace App\Repositories\Figure;

use App\Classes\FigureTypesEnum;
use App\Interfaces\Figure\FigureInterface;
use Illuminate\Support\Arr;

class SquareRepository implements FigureInterface
{
    /*
     * Calculate square area
     */
    public function calculate($requestData)
    {
        if (Arr::get($requestData, 'sideSquare') > 0) {
            $mainArea = pow(Arr::get($requestData, 'sideSquare'), 2);
        } else {
            $mainArea = null;
            session()->flash('message', 'Cторона должна быть больше нуля');
        }

        return $mainArea;
    }
}
