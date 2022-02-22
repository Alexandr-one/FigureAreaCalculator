<?php

namespace App\Repositories\Figure;

use App\Classes\FigureTypesEnum;
use App\Interfaces\Figure\FigureInterface;
use Illuminate\Support\Arr;

class TriangleRepository implements FigureInterface
{
    /*
     * Calculate triangle area
     */
    public function calculate($requestData)
    {
        if (Arr::get($requestData, 'firstInputRect') + Arr::get($requestData, 'secondInputRect') > Arr::get($requestData, 'thirdInputRect') &&
            Arr::get($requestData, 'firstInputRect') + Arr::get($requestData, 'thirdInputRect') > Arr::get($requestData, 'secondInputRect') &&
            Arr::get($requestData, 'secondInputRect') + Arr::get($requestData, 'thirdInputRect') > Arr::get($requestData, 'firstInputRect')
        ) {
            $p = (Arr::get($requestData, 'firstInputRect') + Arr::get($requestData, 'secondInputRect') + Arr::get($requestData, 'thirdInputRect')) / 2;
            $mainArea = sqrt($p * ($p - Arr::get($requestData, 'firstInputRect')) * ($p - Arr::get($requestData, 'secondInputRect')) * ($p - Arr::get($requestData, 'thirdInputRect')));
        } else {
            $mainArea = null;
            session()->flash('message', 'Такого треугольника не существует');
        }

        return $mainArea;
    }
}
