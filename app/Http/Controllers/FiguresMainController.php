<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteRequest;
use App\Http\Requests\InputRequest;
use App\Repositories\FiguresMainRepository;

class FiguresMainController extends Controller
{
    /** @var FiguresMainRepository  */
    protected $repositoryFigures;

    public function __construct(
        FiguresMainRepository $repositoryFigures
    )
    {
        $this->repositoryFigures = $repositoryFigures;
    }

    /*
     * Show figure
     */
    public function index()
    {
        $figures = $this->repositoryFigures->showFigures();

        return view('welcome', compact('figures'));
    }

    /*
     * Delete figure
     */
    public function delete(DeleteRequest $request)
    {
        $this->repositoryFigures->deleteFigure($request->all());

        return redirect('/');
    }

    /*
     * Calculate Area
     */
    public function calculate(InputRequest $request)
    {
        $this->repositoryFigures->calculateArea($request->all());

        return redirect('/');
    }
}
