<?php

namespace App\Factories;

use App\Classes\FigureTypesEnum;
use App\Interfaces\Figure\FigureInterface;
use App\Repositories\Figure\CircleRepository;
use App\Repositories\Figure\RectangleRepository;
use App\Repositories\Figure\SquareRepository;
use App\Repositories\Figure\TriangleRepository;

class FigureFactory
{
    public static function make(string $type): FigureInterface
    {
        switch ($type) {
            case FigureTypesEnum::TRIANGLE:
                return new TriangleRepository();

            case FigureTypesEnum::RECTANGLE:
                return new RectangleRepository();

            case FigureTypesEnum::CIRCLE:
                return new CircleRepository();

            case FigureTypesEnum::SQUARE:
                return new SquareRepository();

            default:
                throw new \Exception('No such repository');
        }
    }
}
