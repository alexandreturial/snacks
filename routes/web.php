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



Route::get('/entrar', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('entrar');
Route::get('/registro', '\App\Http\Controllers\Auth\RegisterController@showRegisterForm')->name('registro');
//Route::get('/home', 'Auth\LoginController@showLoginForm')->name('home');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::post('/register', '\App\Http\Controllers\Auth\RegisterController@create')->name('register');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/', 'welcomeController@index');

Route::get('/products', 'ProductController@index');

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\AdminController@index')->name('adm_index');
    Route::post('/search', 'Admin\AdminController@search')->name('adm_buscar');
    

    Route::post('/new-product', 'ProductController@create')->name('new_product');
    
    Route::post('/update-product', 'ProductController@update')->name('update_product');
    Route::get('/edit-product/{id}', 'ProductController@show')->name('adm_edit_prod');

    Route::post('/block-prduct', 'ProductController@block');

    Route::get('/responsible', 'Admin\AdminController@responsible')->name('adm_responsible');
    Route::post('/search-resp', 'Admin\AdminController@searchResp')->name('adm_buscar');
    Route::post('/new-responsible', 'Admin\AdminController@createResponsible')->name('new_responsible');

    Route::get('/edit/{id}', 'Admin\AdminController@showResponsible')->name('adm_edit_res');
    Route::post('/update-responsible', 'Admin\AdminController@updateResponsible')->name('update_res');
    Route::get('/remove/{id}', 'Admin\AdminController@destroyResponsible')->name('remove_res');

    Route::get('/student', 'Admin\AdminController@student')->name('adm_student');
    Route::post('/search-student', 'Admin\AdminController@searchStudent')->name('search_student');
});

Route::prefix('responsible')->group(function () {

    Route::get('/', 'Responsible\ResponsibleController@index')->name('resp_student');
    Route::post('/search-student', 'Responsible\ResponsibleController@searchStudent');

    Route::post('/new-student', 'Responsible\ResponsibleController@create')->name('new_student');

    Route::get('/edit', function () {
        return view('responsible/student_edit');
    })->name('resp_edit');

    // Route::get('/student', function () {
    //     return view('responsible/student');
    // })->name('resp_student');

    Route::get('/detail/{id?}', 'Responsible\ResponsibleController@show')->name('resp_detail');

    Route::get('/deposit', function () {
        return view('responsible/deposit');
    })->name('resp_deposit');

    Route::get('/extract', function () {
        return view('responsible/extract');
    })->name('resp_extract');

    Route::get('/consumption', function () {
        return view('responsible/consumption');
    })->name('resp_consumption');

});

Route::prefix('student')->group(function () {
    Route::get('/', function () {
        return view('student/index');
    })->name('stu_index');
    

    Route::get('/extract', function () {
        return view('student/extract');
    })->name('stu_extract');

    Route::get('/consumption', function () {
        return view('student/consumption');
    })->name('stu_consumption');
    
});
