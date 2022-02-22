<?php
Route::get('/',[\App\Http\Controllers\FiguresMainController::class, 'index'])->name('index');
Route::post('/delete',[\App\Http\Controllers\FiguresMainController::class, 'delete'])->name('delete');
Route::post('/calculate',[\App\Http\Controllers\FiguresMainController::class, 'calculate'])->name('calculate');
