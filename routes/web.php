<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpasarkumController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\OgtaterController;
use App\Http\Controllers\SosController;
use App\Http\Controllers\EvakuatorController;
use App\Http\Controllers\VulkanacumController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|updateForm
*/


Route::group(["middleware" => "auth"], function(){
//SPASARKUM
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('spasarkum', [SpasarkumController::class, 'allData'])->name('spasarkum');
    Route::get('addForm', [SpasarkumController::class, 'addForm'])->name('addForm');
    Route::post('submit', [SpasarkumController::class, 'submit'])->name('submit');
    Route::get('delete/{id}', [SpasarkumController::class, 'delete'])->name('delete');
    Route::get('update/{id}', [SpasarkumController::class, 'update'])->name('update');
    Route::post('update/{id}', [SpasarkumController::class, 'updateForm'])->name('updateForm');
    Route::get('serviceMap/{id}', [SpasarkumController::class, 'serviceMap'])->name('serviceMap');
//SPASARKUM//NORUTYUN
    Route::get('addnews/{id}', [SpasarkumController::class, 'addnews'])->name('addnews');
    Route::post('submitNews', [SpasarkumController::class, 'submitNews'])->name('submitNews');
    Route::get('deleteNews/{id}', [SpasarkumController::class, 'deleteNews'])->name('deleteNews');
    Route::post('updateNews/{id}', [SpasarkumController::class, 'updateNews'])->name('updateNews');
//SPASARKUM//XORHURD
    Route::get('addAdvice/{id}', [SpasarkumController::class, 'addAdvice'])->name('addAdvice');
    Route::post('submitAdvice', [SpasarkumController::class, 'submitAdvice'])->name('submitAdvice');
    Route::get('deleteAdvice/{id}', [SpasarkumController::class, 'deleteAdvice'])->name('deleteAdvice');
    Route::post('updateAdvice/{id}', [SpasarkumController::class, 'updateAdvice'])->name('updateAdvice');
//PARTNER
    Route::get('partner', [PartnerController::class, 'index'])->name('partner');
    Route::get('updatePartner/{id}', [PartnerController::class, 'updatePartner'])->name('updatePartner');
    Route::post('updatePartner/{id}', [PartnerController::class, 'updatePartnerForm'])->name('updatePartnerForm');
//OGTATER
    Route::get('ogtater', [OgtaterController::class, 'index'])->name('ogtater');
    Route::get('deleteOgtater/{id}',[OgtaterController::class, 'deleteUser'])->name('delete22');
    Route::get('updateOgtater/{id}', [OgtaterController::class, 'update'])->name('updateOgtater');
    Route::post('updateOgtaterForm/{id}', [OgtaterController::class, 'updateOgtaterForm'])->name('updateOgtaterForm');
//SOS
    Route::get('sos',[SosController::class, 'index'])->name('sos');
    Route::get('gmaps/{id}',[HomeController::class, 'gmaps'])->name('google');
//EVAKUATOR
    Route::get('evakuator',[EvakuatorController::class, 'index'])->name('evakuator');
    Route::get('addevakuator',[EvakuatorController::class, 'add'])->name('addevakuator');
    Route::post('submitEvakuator', [EvakuatorController::class, 'submitEv'])->name('submitEvakuator');
    Route::get('deleteEvakuator/{id}',[EvakuatorController::class, 'deleteEvakuator'])->name('deleteEvakuator');
    Route::get('updateEvakuator/{id}', [EvakuatorController::class, 'updateEvakuator'])->name('updateEvakuator');
    Route::post('updateEvakuatorForm/{id}', [EvakuatorController::class, 'updateEvakuatorForm'])->name('updateEvakuatorForm');
//VULKANACUM
    Route::get('vulkanacum',[VulkanacumController::class, 'index'])->name('vulkanacum');
    Route::get('addVulkanacum',[VulkanacumController::class, 'add'])->name('addVulkanacum');
    Route::post('submitVulkanacum', [VulkanacumController::class, 'submitVulkanacum'])->name('submitVulkanacum');
    Route::get('deleteVulkanacum/{id}',[VulkanacumController::class, 'deleteVulkanacum'])->name('deleteVulkanacum');
    Route::get('updateVulkanacum/{id}', [VulkanacumController::class, 'updateVulkanacum'])->name('updateVulkanacum');
    Route::post('updateVulkanacumrForm/{id}', [VulkanacumController::class, 'updateVulkanacumrForm'])->name('updateVulkanacumrForm');

    Route::post('postEvakuators',[HomeController::class, 'gmapsSelect'])->name('postEvakuators');
//APPA
    Route::get('appa',[HomeController::class, 'appa'])->name('appa');
    Route::get('addAppa',[HomeController::class, 'addAppa'])->name('addAppa');
    Route::post('submitAppa',[HomeController::class, 'submitAppa'])->name('submitAppa');
    Route::get('deleteAppa/{id}', [HomeController::class, 'deleteAppa'])->name('deleteAppa');
    Route::get('updateAppa/{id}', [HomeController::class, 'updateAppa'])->name('updateAppa');
    Route::post('updateAppaForm/{id}', [HomeController::class, 'updateAppaForm'])->name('updateAppaForm');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
