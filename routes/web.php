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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {

    //PPMP
    Route::get('/ppmp/{ppmp_id}', 'PpmpController@view')->name('ppmp-view');
    Route::post('/ppmp/store', 'PpmpController@store')->name('ppmp-store');
    Route::get('/ppmp/generate-report/{ppmp_id}', 'PpmpController@generateReport')->name('ppmp-generate-report');

    //PPMP ITEM
    Route::get('/ppmp/item/{ppmp_item_id}', 'PpmpItemController@view')->name('ppmp-item-view');
    Route::get('/ppmp/item/mark/{ppmp_item_id}', 'PpmpItemController@storeRemarks')->name('ppmp-item-mark');

    //COST CENTER
    Route::get('/ppmp/cost-center/list', 'CostCenterController@list')->name('cost-center-list');
    Route::get('/ppmp/cost-center/new', 'CostCenterController@create')->name('cost-center-create');
    Route::post('/ppmp/cost-center/store', 'CostCenterController@store')->name('cost-center-store');
    Route::get('/ppmp/cost-center/edit/{cost_center_id}', 'CostCenterController@edit')->name('cost-center-edit');
    Route::put('/ppmp/cost-center/update/{cost_center_id}', 'CostCenterController@update')->name('cost-center-update');
    Route::get('/ppmp/cost-center/delete/{cost_center_id}', 'CostCenterController@delete')->name('cost-center-delete');

    //FUND SOURCE
    Route::get('/ppmp/fund-source/list', 'FundSourceController@list')->name('fund-source-list');
    Route::get('/ppmp/fund-source/new', 'FundSourceController@create')->name('fund-source-create');
    Route::post('/ppmp/fund-source/store', 'FundSourceController@store')->name('fund-source-store');
    Route::get('/ppmp/fund-source/edit/{fund_source_id}', 'FundSourceController@edit')->name('fund-source-edit');
    Route::put('/ppmp/fund-source/update/{fund_source_id}', 'FundSourceController@update')->name('fund-source-update');
    Route::get('/ppmp/fund-source/delete/{fund_source_id}', 'FundSourceController@delete')->name('fund-source-delete');

    //ACCOUNT
    Route::get('/ppmp/account/list', 'AccountController@list')->name('account-list');
    Route::get('/ppmp/account/new', 'AccountController@create')->name('account-create');
    Route::post('/ppmp/account/store', 'AccountController@store')->name('account-store');
    Route::get('/ppmp/account/edit/{account_id}', 'AccountController@edit')->name('account-edit');
    Route::put('/ppmp/account/update/{account_id}', 'AccountController@update')->name('account-update');
    Route::get('/ppmp/account/delete/{account_id}', 'AccountController@delete')->name('account-delete');
});
