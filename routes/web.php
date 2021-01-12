<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpasarkumController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\OgtaterController;
use App\Http\Controllers\SosController;
use App\Http\Controllers\EvakuatorController;
use App\Http\Controllers\VulkanacumController;
use App\Http\Controllers\SpasarkumJsonController;
use App\Http\Controllers\VulkanacumJsonController;
use App\Http\Controllers\EvakuatorJsonController;
use App\Http\Controllers\OgtaterJsonController;
use App\Http\Controllers\AppaJsonController;
use App\Http\Controllers\NewsJsonController;
use App\Http\Controllers\AdviceJsonController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\CardController;




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
//PARTNER
    Route::get('partner', [PartnerController::class, 'index'])->name('partner');
    Route::get('updatePartner/{id}', [PartnerController::class, 'updatePartner'])->name('updatePartner');
    Route::post('updatePartner/{id}', [PartnerController::class, 'updatePartnerForm'])->name('updatePartnerForm');
    Route::get('deletePartner/{id}', [PartnerController::class, 'deletePartner'])->name('deletePartner');
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
    Route::get('addevakuator',[EvakuatorController::class, 'addForm'])->name('addevakuator');
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
//NORUTYUN
    Route::get('news', [NewsJsonController::class, 'news'])->name('news');
    Route::get('updateNews/{id}', [NewsJsonController::class, 'updateNews'])->name('updateNews');
    Route::post('updateFormNews/{id}', [NewsJsonController::class, 'updateFormNews'])->name('updateFormNews');
    Route::get('addnews', [NewsJsonController::class, 'addnews'])->name('addnews');
    Route::post('submitNews', [NewsJsonController::class, 'submitNews'])->name('submitNews');
    Route::get('deleteNews/{id}', [NewsJsonController::class, 'deleteNews'])->name('deleteNews');
//XORHURD
    Route::get('advice',[AdviceJsonController::class, 'advice'])->name('advice');
    Route::post('submitAdvice', [AdviceJsonController::class, 'submitAdvice'])->name('submitAdvice');
    Route::get('addAdvice', [AdviceJsonController::class, 'addAdvice'])->name('addAdvice');
    Route::get('deleteAdvice/{id}', [AdviceJsonController::class, 'deleteAdvice'])->name('deleteAdvice');
    Route::get('updateAdvice/{id}', [AdviceJsonController::class, 'updateAdvice'])->name('updateAdvice');
    Route::post('updateFormAdvice/{id}', [AdviceJsonController::class, 'updateFormAdvice'])->name('updateFormAdvice');
//NAMAKNER
    Route::get('answer',[AnswerController::class, 'index'])->name('answer');
    Route::get('deleteAnswer/{id}', [AnswerController::class, 'deleteAnswer'])->name('deleteAnswer');
    Route::get('updateAnswer/{id}', [AnswerController::class, 'updateAnswer'])->name('updateAnswer');
    Route::post('updateFormAnswer/{id}', [AnswerController::class, 'updateFormAnswer'])->name('updateFormAnswer');
//KANONNER
    Route::get('rules', [RulesController::class, 'index'])->name('rules');
    Route::get('deleteRule/{id}', [RulesController::class, 'deleteRule'])->name('deleteRule');
    Route::get('addRule', [RulesController::class, 'addRule'])->name('addRule');
    Route::post('submitRule',[RulesController::class, 'submitRule'])->name('submitRule');
    Route::get('updateRule/{id}', [RulesController::class, 'updateRule'])->name('updateRule');
    Route::post('updateRuleForm/{id}', [RulesController::class, 'updateRuleForm'])->name('updateRuleForm');
//CARD
    Route::get('card', [CardController::class, 'index'])->name('card');
    Route::get('deleteCard/{id}', [CardController::class, 'deleteCard'])->name('deleteCard');
    Route::get('updateCard/{id}', [CardController::class, 'updateCard'])->name('updateCard');
    Route::get('updateCardEdit/{id}', [CardController::class, 'updateCardEdit'])->name('updateCardEdit');
    Route::post('updateCardEditForm/{id}', [CardController::class, 'updateCardEditForm'])->name('updateCardEditForm');


});
//API Linker
    Route::get('serviceJson/{service}', [SpasarkumJsonController::class, 'index']);
    Route::get('vulcanizationJson', [VulkanacumJsonController::class, 'index']);
    Route::get('EvacuatorJson', [EvakuatorJsonController::class, 'index']);
    Route::get('UserJson', [OgtaterJsonController::class, 'index']);
    Route::get('AppaJson', [AppaJsonController::class, 'index']);
    Route::get('NewsJson', [NewsJsonController::class, 'index']);
    Route::get('AdviceJson', [AdviceJsonController::class, 'index']);
    Route::get('NewOgtaterJsonId', [AnswerController::class, 'newOgtater']);
    Route::get('createquestion/{user_id}/{title}/{question}', [AnswerController::class, 'createQuestion'])->name('createquestion');
    Route::get('getAnswer/{id}', [AnswerController::class, 'getAnswer'])->name('getAnswer');
    Route::get('createCardPayment/{payment_card}/{payment_idram}/{adress}/{sum}/{end_of_term}', [CardController::class, 'createCardPayment'])->name('createCardPayment');
    Route::get('rulesJson', [RulesController::class, 'indexJson'])->name('rulesJson');
    Route::get('numberAdressJson/{id}', [SpasarkumJsonController::class, 'numberAdress']);
//IDRAM
Route::get('payment/success', [\App\Http\Controllers\PaymentController::class, 'success']);
Route::get('payment/error', [\App\Http\Controllers\PaymentController::class, 'error']);


Auth::routes();

Route::get('/clear-cache', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/home', 'HomeController@index')->name('home');
