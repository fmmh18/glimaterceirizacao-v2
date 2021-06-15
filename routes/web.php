<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'site'],function () {
    Route::get('/','homeController@index')->name('site.home');
    Route::get('/empresa','homeController@company')->name('site.company');
    Route::get('/contato','contactController@index')->name('site.contact');
    Route::get('/trabalhe','workController@index')->name('site.work');
    Route::post('/orcamento','budgetController@store')->name('site.budget.send');
    Route::post('/contato','contactController@store')->name('site.contact.send');
    Route::post('/trabalhe','workController@store')->name('site.work.send');
});

Auth::routes();

Route::group(['middleware' => ['auth'], 'namespace' => 'dashboard'],function (){
    Route::group(['middleware' => ['can:isAdmin']], function() {

        Route::get('/dashboard/principal', 'HomeController@index')->name('dashboard.home');

        Route::get('/dashboard/noticia','newsController@index')->name('dashboard.news.list');
        Route::get('/dashboard/noticia/adicionar','newsController@insert')->name('dashboard.news.add');
        Route::get('/dashboard/noticia/editar/{id}','newsController@edit')->name('dashboard.news.edit');
        Route::post('/dashboard/noticia/adicionar','newsController@store')->name('dashboard.news.add.send');
        Route::post('/dashboard/noticia/editar','newsController@update')->name('dashboard.news.edit.send');
        Route::get('/dashboard/noticia/apagar/{id}','newsController@delete')->name('dashboard.news.del.send');

        Route::get('/dashboard/contato','contactController@index')->name('dashboard.contact.list');
        Route::get('/dashboard/contato/editar/{id}','contactController@edit')->name('dashboard.contact.edit');
        Route::get('/dashboard/contato/apagar/{id}','contactController@delete')->name('dashboard.contact.del.send');

        Route::get('/dashboard/orcamento','budgetController@index')->name('dashboard.budget.list');
        Route::get('/dashboard/orcamento/editar/{id}','budgetController@edit')->name('dashboard.budget.edit');
        Route::post('/dashboard/orcamento/editar','budgetController@update')->name('dashboard.budget.edit.send');
        Route::get('/dashboard/orcamento/apagar/{id}','budgetController@delete')->name('dashboard.budget.del.send');


        Route::get('/dashboard/usuario','userController@index')->name('dashboard.user.list');
        Route::get('/dashboard/usuario/adicionar','userController@insert')->name('dashboard.user.add');
        Route::get('/dashboard/usuario/editar/{id}','userController@edit')->name('dashboard.user.edit');
        Route::post('/dashboard/usuario/adicionar','userController@store')->name('dashboard.user.add.send');
        Route::post('/dashboard/usuario/editar','userController@update')->name('dashboard.user.edit.send');
        Route::get('/dashboard/usuario/apagar/{id}','userController@delete')->name('dashboard.user.del.send');


        Route::get('/dashboard/curriculo','workController@index')->name('dashboard.curriculum.list');
        Route::get('/dashboard/curriculo/adicionar','workController@insert')->name('dashboard.curriculum.add');
        Route::get('/dashboard/curriculo/editar/{id}','workController@edit')->name('dashboard.curriculum.edit');
        Route::post('/dashboard/curriculo/adicionar','workController@store')->name('dashboard.curriculum.add.send');
        Route::post('/dashboard/curriculo/editar','workController@update')->name('dashboard.curriculum.edit.send');
        Route::get('/dashboard/curriculo/apagar/{id}','workController@delete')->name('dashboard.curriculum.del.send');

        Route::get('/dashboard/carousel','carouselController@index')->name('dashboard.carousel.list');
        Route::get('/dashboard/carousel/adicionar','carouselController@insert')->name('dashboard.carousel.add');
        Route::get('/dashboard/carousel/editar/{id}','carouselController@edit')->name('dashboard.carousel.edit');
        Route::post('/dashboard/carousel/adicionar','carouselController@store')->name('dashboard.carousel.add.send');
        Route::post('/dashboard/carousel/editar','carouselController@update')->name('dashboard.carousel.edit.send');
        Route::get('/dashboard/carousel/apagar/{id}','carouselController@delete')->name('dashboard.carousel.del.send');

        Route::get('/dashboard/image','imageController@index')->name('dashboard.image.list');
        Route::get('/dashboard/image/adicionar','imageController@insert')->name('dashboard.image.add');
        Route::get('/dashboard/image/editar/{id}','imageController@edit')->name('dashboard.image.edit');
        Route::post('/dashboard/image/adicionar','imageController@store')->name('dashboard.image.add.send');
        Route::post('/dashboard/image/editar','imageController@update')->name('dashboard.image.edit.send');
        Route::get('/dashboard/image/apagar/{id}','imageController@delete')->name('dashboard.image.del.send');

    });


});
