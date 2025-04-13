<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


Route::get('/', [StudentController::class, 'showSearchForm'])->name('search.form');
Route::post('/search', [StudentController::class, 'searchStudent'])->name('search.student');
Route::post('/confirm-presence', [StudentController::class, 'confirmPresence'])->name('confirm.presence');
// Route::get('/test' , [ StudentController::class , 'test'] )->name('test');
