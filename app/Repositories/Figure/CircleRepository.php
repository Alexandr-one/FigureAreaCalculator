<?php

namespace App\Repositories\Figure;

use App\Classes\FigureTypesEnum;
use App\Interfaces\Figure\FigureInterface;
use Illuminate\Support\Arr;

class CircleRepository implements FigureInterface
{
    /*
     * Calculate circle area
     */
    public function calculate($requestData)
    {
        if (Arr::get($requestData, 'radius') > 0) {
            $mainArea = pow(Arr::get($requestData, 'radius'), 2) * pi();
        } else {
            $mainArea = null;
            session()->flash('message', 'Радиус должен быть больше нуля');
        }

        return $mainArea;
    }
}
