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
Route::get('dropzone-image-upload', 'dropzone_image_upload\ImageUploadController@index');
Route::post('dropzone-image-upload', 'dropzone_image_upload\ImageUploadController@store');
Route::get('fileuploader/','dropzone_image_upload\ImageUploadController@fileuploader');


Route::post('/images', 'dropzone_image_upload\ImageUploadController@saveto');


