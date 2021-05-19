<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\Animal\AnimalController;
use App\Http\Controllers\Animal\MedicalController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('setting')->name('setting.')->group(function () {
    Route::get('/', [SettingController::class, 'getIndex'])->name('index');
    Route::get('/area', [SettingController::class, 'getArea'])->name('area');
    Route::post('/createArea', [SettingController::class, 'createArea'])->name('createArea');
    Route::post('/deleteArea/{area}', [SettingController::class, 'deleteArea'])->name('deleteArea');
    Route::get('/updateArea/{area}', [SettingController::class, 'updateArea'])->name('updateArea');
    Route::post('/postUpdateArea/{area}', [SettingController::class, 'postUpdateArea'])->name('postUpdateArea');
});

Route::prefix('animal')->name('animal.')->group(function () {
    Route::get('/', [AnimalController::class, 'getIndex'])->name('index');
    Route::get('/search', [AnimalController::class, 'getIndex'])->name('search');
    Route::get('/create', [AnimalController::class, 'getCreate'])->name('create');
    Route::get('/info-{animal}', [AnimalController::class, 'getInfo'])->name('info');
    Route::post('/postCreate', [AnimalController::class, 'postCreate'])->name('postCreate');
    Route::get('/dog', [AnimalController::class, 'getDog'])->name('dog');
    Route::get('/cat', [AnimalController::class, 'getCat'])->name('cat');
    Route::get('/other', [AnimalController::class, 'getOther'])->name('other');
    Route::get('/update/{animal}', [AnimalController::class, 'getUpdate'])->name('update');
    Route::post('/postUpdate/{animal}', [AnimalController::class, 'postUpdate'])->name('postUpdate');
    Route::post('/postDelete/{animal}', [AnimalController::class, 'postDelete'])->name('postDelete');
});

Route::prefix('medical')->name('medical.')->group(function () {
    Route::get('/', [MedicalController::class, 'getIndex'])->name('index');
    Route::get('/search', [MedicalController::class, 'getIndex'])->name('search');
    Route::get('/create/{animal}', [MedicalController::class, 'getCreate'])->name('create');
    Route::post('/postCreate', [MedicalController::class, 'postCreate'])->name('postCreate');
    Route::get('/update/{record}', [MedicalController::class, 'getUpdate'])->name('update');
    Route::post('/postUpdate/{record}', [MedicalController::class, 'postUpdate'])->name('postUpdate');
    Route::post('/postDelete/{record}', [MedicalController::class, 'postDelete'])->name('postDelete');
});

Route::prefix('area')->name('area.')->group(function () {
    Route::get('/', [AreaController::class, 'getIndex'])->name('index');
    Route::get('{area}/list', [AreaController::class, 'getList'])->name('list');
    Route::get('/search{area}', [AreaController::class, 'getList'])->name('search');
});

Route::prefix('reminder')->name('reminder.')->group(function () {
    Route::get('/', [ReminderController::class, 'getIndex'])->name('index');
    Route::get('/vaccine', [ReminderController::class, 'getVaccine'])->name('vaccine');
    Route::get('/month/{month}', [ReminderController::class, 'getMonth'])->name('month');

    Route::get('/clinic', [ReminderController::class, 'getClinic'])->name('clinic');
});

