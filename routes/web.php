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

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin/index');
    })->name('adm_index');
    Route::get('/edit-product', function () {
        return view('admin/editProduct');
    })->name('adm_edit_prod');

    Route::get('/responsible', function () {
        return view('admin/responsible');
    })->name('adm_responsible');
    Route::get('/edit', function () {
        return view('admin/editResponsible');
    })->name('adm_edit_res');

    Route::get('/student', function () {
        return view('admin/student');
    })->name('adm_student');
});

Route::prefix('responsible')->group(function () {

    Route::get('/', function () {
        return view('responsible/student');
    })->name('resp_student');

    Route::get('/edit', function () {
        return view('responsible/student_edit');
    })->name('resp_edit');

    // Route::get('/student', function () {
    //     return view('responsible/student');
    // })->name('resp_student');

    Route::get('/detail', function () {
        return view('responsible/detail');
    })->name('resp_detail');

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
