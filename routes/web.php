<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::controller(TaskController::class)->group(function () {
    Route::get('/', 'index')->name('task.index');
    Route::get('task/create', 'create')->name('task.create');
    Route::post('task/store', 'store')->name('task.store');
});
