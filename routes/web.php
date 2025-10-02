<?php

use App\Http\Controllers\TaskController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;



Route::get('/',[TaskController::class,'index'])->name('index');
Route::get('/create',[TaskController::class, 'create'])->name('create');
Route::post('/create/create-post',[TaskController::class, 'store'])->name('store');
Route::get('/create/modifier/{id}  ',[TaskController::class, 'edit'])->name('edit');
Route::put('/create/update/{id}',[TaskController::class, 'update'])->name('update');
Route::delete('/create/delete/{id}',[Taskcontroller::class,'destroy'])->name('destroy');
