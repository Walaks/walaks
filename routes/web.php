<?php

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

Route::get('/', 'Front\HomeController@index');
Route::post('/mensagem', 'Front\HomeController@mensagem');


Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\AdminController@index');

    Route::prefix('header')->group(function () {
        Route::get('/', 'Admin\HeaderController@index');
        Route::get('/criar', 'Admin\HeaderController@Criar');
        Route::get('/editar/{id}', 'Admin\HeaderController@Editar');
        Route::post('/criar', 'Admin\HeaderController@Salvar');
        Route::get('/excluir/{id}', 'Admin\HeaderController@Excluir');
    });

    Route::prefix('servico')->group(function () {
        Route::get('/', 'Admin\ServicoController@index');
        Route::get('/criar', 'Admin\ServicoController@Criar');
        Route::get('/editar/{id}', 'Admin\ServicoController@Editar');
        Route::post('/criar', 'Admin\ServicoController@Salvar');
        Route::get('/excluir/{id}', 'Admin\ServicoController@Excluir');
    });

    Route::prefix('portifolio')->group(function () {
        Route::get('/', 'Admin\PortifolioController@index');
        Route::get('/criar', 'Admin\PortifolioController@Criar');
        Route::get('/editar/{id}', 'Admin\PortifolioController@Editar');
        Route::post('/criar', 'Admin\PortifolioController@Salvar');
        Route::get('/excluir/{id}', 'Admin\PortifolioController@Excluir');
    });

    Route::prefix('experiencia')->group(function () {
        Route::get('/', 'Admin\ExperienciaController@index');
        Route::get('/criar', 'Admin\ExperienciaController@Criar');
        Route::get('/editar/{id}', 'Admin\ExperienciaController@Editar');
        Route::post('/criar', 'Admin\ExperienciaController@Salvar');
        Route::get('/excluir/{id}', 'Admin\ExperienciaController@Excluir');
    });

    Route::prefix('sobre')->group(function () {
        Route::get('/', 'Admin\SobreController@index');
        Route::get('/criar', 'Admin\SobreController@Criar');
        Route::get('/editar/{id}', 'Admin\SobreController@Editar');
        Route::post('/criar', 'Admin\SobreController@Salvar');
        Route::get('/excluir/{id}', 'Admin\SobreController@Excluir');
    });
    
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
