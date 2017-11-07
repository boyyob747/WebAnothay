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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

Auth::routes();

Route::get('/home', 'PagesController@index')->name('home');
Route::resource('/home/teacher','TeachersController');
// Route::post('import','FileExcelController@import');
Route::resource('/home/student','StudentsController');
Route::resource('/home/lophocphan','LopHocPhanController');//BaiTracNghiem
Route::resource('/home/thongtinlophocphans','ThongTinLopHocPhanController'); //CauHoiController
Route::resource('/home/baitracnghiem','BaiTracNgiemController');
Route::get('/home/getdsbaitap/{id}','BaiTracNgiemController@getBaiTap');//getExportTeachers
Route::get('/home/lambai/{id}','BaiTracNgiemController@lamBaitap');
Route::get('/home/lambaithi/{id}','BaiTracNgiemController@lamBaiThi');
Route::get('/home/counttime','BaiTracNgiemController@doCountTime');
Route::post('/home/getketqua','BaiTracNgiemController@getKetQua'); //setStateTest
Route::post('/home/setStateTest','ThongTinLopHocPhanController@setStateTest');
Route::get('/home/setstate/{state}/{lophocphan_id}','ThongTinLopHocPhanController@setStateTestAll');
Route::resource('/home/cauhoi','CauHoiController');
Route::get('/import','FileExcelController@getImport');//getExportTeachers
Route::post('/importsinhvien','FileExcelController@postImportSinhvien'); //importsinhvienforlophoc getThongTinLopSV
Route::get('/getthongtinlopsv','ThongTinLopHocPhanController@getThongTinLopSV');
Route::post('/importsinhvienforlophoc','FileExcelController@postImportDanhSachSinhvien');
Route::get('/exportteachers','FileExcelController@getExportTeachers');//getExportSinhviens
Route::get('/exportstudents','FileExcelController@getExportSinhviens');
Route::post('/postImport','FileExcelController@postImport');
//deleteAll
Route::get('/deleteAll/{state}','TeachersController@deleteAll');
Route::get('/deleteteacher/{id}','TeachersController@deleteTeacher');
//updateAjax
