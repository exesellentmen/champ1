<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\MainController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');



Route::get('/create_championship', 'App\Http\Controllers\MainController@addChampionships');


Route::get('/about', function (){

    return view('champinoships');
});


Route::get('/champteams', 'App\Http\Controllers\MainController@getTeamsChampionship');





// Для чемпионата
Route::get('/champinoships/list', 'App\Http\Controllers\ChampionshipController@getList');

Route::get('/champinoships/new', 'App\Http\Controllers\ChampionshipController@new');

Route::post('/champinoships/add', 'App\Http\Controllers\ChampionshipController@add');

Route::get('/champinoships/{id}/edit', 'App\Http\Controllers\ChampionshipController@edit');

Route::post('/champinoships/{id}/update', 'App\Http\Controllers\ChampionshipController@update');

Route::get('/champinoships/{id}/detail', 'App\Http\Controllers\ChampionshipController@getById');

//Формирование плей офф
Route::post('/champinoships/{id}/generate-playoff', 'App\Http\Controllers\ChampionshipController@generatePlayOff');

Route::get('/champinoships/{champinoshipsid}/autofilling', 'App\Http\Controllers\ChampionshipController@autofilling');






//Для команд
Route::get('/teams/list', 'App\Http\Controllers\TeamController@getList');

Route::get('/teams/new', 'App\Http\Controllers\TeamController@new');

Route::post('/teams/add', 'App\Http\Controllers\TeamController@add');

Route::get('/teams/{id}/edit', 'App\Http\Controllers\TeamController@edit');

Route::post('/teams/{id}/update', 'App\Http\Controllers\TeamController@update');



Route::get('/champinoships/{champinoship}/division/{division}/teams/{id}/delete', 'App\Http\Controllers\TeamController@delete');

Route::get('/champinoships/{champinoship}/division/{division}/teams/new', 'App\Http\Controllers\TeamController@newFromDivision');

Route::post('/champinoships/{champinoship}/division/{division}/teams/add', 'App\Http\Controllers\TeamController@addFromDivision');

Route::get('/champinoships/{champinoship}/division/{division}/teams/{id}/edit', 'App\Http\Controllers\TeamController@editFromDivision');

Route::post('/champinoships/{champinoship}/division/{division}/teams/{id}/update', 'App\Http\Controllers\TeamController@updateFromDivision');






//Для девизионов чемпионата

Route::get('/champinoships/{champinoship}/division/{id}/delete', 'App\Http\Controllers\DivisionController@delete');

Route::get('/champinoships/{champinoship}/division/new', 'App\Http\Controllers\DivisionController@new');

Route::post('/champinoships/{champinoship}/division/add', 'App\Http\Controllers\DivisionController@add');

Route::get('/champinoships/{champinoship}/division/{id}/edit', 'App\Http\Controllers\DivisionController@edit');

Route::post('/champinoships/{champinoship}/division/{id}/update', 'App\Http\Controllers\DivisionController@update');

Route::get('/champinoships/{champinoship}/division/{division}/teams/{id}/select', 'App\Http\Controllers\DivisionController@selectTeam');

Route::get('/champinoships/{champinoship}/division/{division}/teams/{id}/unselect', 'App\Http\Controllers\DivisionController@unselectTeam');



//Для игр
Route::get('/champinoships/{champinoship}/division/{division}/games/generate', 'App\Http\Controllers\GameController@generate');


Route::get('/champinoships/{champinoship}/division/{division}/games/{id}/edit', 'App\Http\Controllers\GameController@edit');

Route::post('/champinoships/{champinoship}/division/{division}/games/{id}/update', 'App\Http\Controllers\GameController@update');





Route::get('/champinoships/{champinoship}/stage/games/{id}/edit', 'App\Http\Controllers\GameController@editFromStage');
Route::post('/champinoships/{champinoship}/stage/games/{id}/update', 'App\Http\Controllers\GameController@updateFromStage');
















//Route::middleware(['auth:sanctum', 'verified'])->get('/create_championship', 'MainController@addChampionships');









