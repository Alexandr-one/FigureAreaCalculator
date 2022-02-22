<?php

namespace App\Repositories;

use App\Classes\FigureTypesEnum;
use App\Factories\FigureFactory;
use App\Figure;
use Illuminate\Support\Arr;

class FiguresMainRepository
{
    /*
     * Show figures
     */
    public function showFigures()
    {
        return Figure::orderBy('area', 'desc')->get();
    }

    /*
     * Delete figures
     */
    public function deleteFigure($requestData)
    {
        return Figure::findOrfail(Arr::get($requestData, 'id'))->delete();
    }

    /*
     * Calculate using figure type
     */
    public function calculateArea($requestData)
    {
        $figureRepository = FigureFactory::make(Arr::get($requestData, 'type'));
        $area = $figureRepository->calculate($requestData);

        if($area != null){
            Figure::create([
                'type' => Arr::get($requestData, 'type'),
                'area' => $area,
            ]);
        }

        return $area;
    }
}
