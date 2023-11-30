<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('dashboard.index');
});
Route::controller(TaskController::class)->group(function () {
    Route::get('/task/index', 'index')->name('task.index');
    Route::get('task/create', 'create')->name('task.create');
    Route::post('task/store', 'store')->name('task.store');
    Route::get('task/edit/{task}', 'edit')->name('task.edit');
    Route::put('task/update/{task}', 'update')->name('task.update');
    Route::put('/task/{task}','updateCompeted')->name('task.updateCompleted');
    Route::delete('/task/{task}','destroy')->name('task.destroy');
});
