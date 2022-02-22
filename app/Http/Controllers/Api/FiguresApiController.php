<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Api\FiguresApiRepository;

class FiguresApiController
{
    /** @var FiguresApiRepository  */
    protected $repositoryFigures;

    public function __construct(FiguresApiRepository $repositoryFigures)
    {
        $this->repositoryFigures = $repositoryFigures;
    }

    /*
     * Statistics
     */
    public function getStats(): array
    {
        return $this->repositoryFigures->getStatsApi();
    }
}
