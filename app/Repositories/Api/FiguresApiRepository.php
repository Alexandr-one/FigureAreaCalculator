<?php

namespace App\Repositories\Api;

use App\Classes\FigureTypesEnum;
use App\Figure;

class FiguresApiRepository
{
    /*
     * Get statistics
     */
    public function getStatsApi(): array
    {
        $sumArea = 0;
        $mass = [];

        $figureTypes = FigureTypesEnum::lists();
        $areas = Figure::get();
        foreach ($areas as $area) {
            $sumArea += $area['area'];
        }

        if ($sumArea > 0) {
            foreach ($figureTypes as $type) {
                $figureArea = 0;
                $figures = Figure::where('type',  $type)->get();

                foreach($figures as $figure) {
                    $figureArea += $figure['area'];
                }

                $mass[$type] = $figureArea * 100 / $sumArea;
            }
        }

        return $mass;
    }
}
