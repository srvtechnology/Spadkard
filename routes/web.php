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

Route::get('/', [App\Http\Controllers\Frontend\Form\FormController::class, 'welcome'])->name('welcome');


//forget pass
Route::post('/enter-email', [App\Http\Controllers\Frontend\Dashboard\DashboardController::class, 'enter_mail'])->name('fgp.enter.email');
Route::get('user/forget-password/email-verify/{id}/{vcode}',[App\Http\Controllers\Frontend\Dashboard\DashboardController::class, 'resetPassowrd'])->name('user.forget.password.email.verify');

Route::post('forget-password/new-password',[App\Http\Controllers\Frontend\Dashboard\DashboardController::class, 'newPassword'])->name('user.reset.new.password');

// Route::post('forget-password/new-password','Dashboard\DashboardController@newPassword')->name('reset.new.password');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users/logout', [App\Http\Controllers\Frontend\Auth\AuthController::class, 'user_logout'])->name('user.logout');

Route::group(['middleware' => ['auth']], function() {

//form part
Route::get('/users/form', [App\Http\Controllers\Frontend\Form\FormController::class, 'form_view'])->name('user.form.view');
Route::post('/users/form/insert', [App\Http\Controllers\Frontend\Form\FormController::class, 'form_ins'])->name('ins.user.form');


//user dashboard
Route::get('/users/dashboard', [App\Http\Controllers\Frontend\Dashboard\DashboardController::class, 'dashboard'])->name('user.dashboard');

//card portion
Route::get('/users/request-card/list', [App\Http\Controllers\Frontend\Card\CardController::class, 'request_card_list'])->name('request.card.list');

Route::get('/users/request-card/add-user/{id}', [App\Http\Controllers\Frontend\Card\CardController::class, 'add_user_view'])->name('add.user.view');

Route::post('/users/request-card/insert', [App\Http\Controllers\Frontend\Card\CardController::class, 'insert_user_card'])->name('insert.user.card');

Route::get('/users/request-card/details/{id}', [App\Http\Controllers\Frontend\Card\CardController::class, 'details_view'])->name('details.view');

Route::get('/users/request-card/delete/{id}', [App\Http\Controllers\Frontend\Card\CardController::class, 'user_delete'])->name('user.delete');


Route::get('/users/request-card/edit/{id}', [App\Http\Controllers\Frontend\Card\CardController::class, 'edit_user_view'])->name('user.edit.page');

Route::post('/users/request-card/update', [App\Http\Controllers\Frontend\Card\CardController::class, 'upd_user'])->name('update.user.card');

Route::get('/users/request-card/printed-card-list/{id}', [App\Http\Controllers\Frontend\Card\CardController::class, 'printed_list'])->name('printed.list');

Route::get('/users/request-card/request-for-print/{id}', [App\Http\Controllers\Frontend\Card\CardController::class, 'request_for_print'])->name('printed.request');

Route::get('/users/request-card/view-detail-card/{id}', [App\Http\Controllers\Frontend\Card\CardController::class, 'view_single_details'])->name('single.card.view');


Route::post('/users/insert-card-with-template', [App\Http\Controllers\Frontend\Card\CardController::class, 'customize_card_ins'])->name('customize.card.ins');


Route::get('/users/edit-profile', [App\Http\Controllers\Frontend\Auth\AuthController::class, 'edit_profile_page'])->name('user.change.profile');

Route::post('/users/update-user', [App\Http\Controllers\Frontend\Auth\AuthController::class, 'update_user'])->name('update.user');


//privew and design

Route::post('/buy-card', [App\Http\Controllers\Frontend\Card\CardController::class, 'buy_card'])->name('buy.card');
Route::post('/preview-card', [App\Http\Controllers\Frontend\Card\CardController::class, 'preview_card'])->name('preview.card');
Route::post('/card-image', [App\Http\Controllers\Frontend\Card\CardController::class, 'card_image'])->name('card.image');


//re print
Route::get('/users/re-print-request/{id}', [App\Http\Controllers\Frontend\RePrintReq\RePrintController::class, 're_print_req_page'])->name('re.print.ins');

Route::post('/users/insert/re-print-request', [App\Http\Controllers\Frontend\RePrintReq\RePrintController::class, 're_print_ins'])->name('insert.reprint.card');

Route::get('/users/re-print-card/list', [App\Http\Controllers\Frontend\RePrintReq\RePrintController::class, 're_print_card_list'])->name('re.print.cards.list');

Route::get('/users/re-print-card/view/{id}', [App\Http\Controllers\Frontend\RePrintReq\RePrintController::class, 'view_card'])->name('view.re.print.card');



//corporate cards
Route::get('/users/corporate-card/list', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'master_list'])->name('corp.list');

Route::get('/users/corporate-card/add-profile/{id}', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'add_profile'])->name('add.profile');

Route::get('/users/corporate-card/list/{id}', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'profile_list'])->name('corp.card.list');

Route::post('/users/corporate-card/insert-profile', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'ins_profile'])->name('insert.corporate.profile');

Route::get('/users/corporate-card/add/{id}', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'card_add_page'])->name('corporate.card.add.page');

Route::post('/users/corporate-card/insert-corporate-card', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'ins_corporate_card'])->name('insert.corporate.card');

Route::get('/users/corporate-card/corp-delete/{id}', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'del'])->name('corp.user.delete');

Route::get('/users/corporate-card/edit/{id}', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'corp_card_edit'])->name('corp.user.edit.page');

Route::post('/users/corporate-card/update', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'corp_card_update'])->name('update.corp.user.card');

Route::get('/users/corporate-card/view/{id}', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'corp_card_view'])->name('single.corp.card.view');

Route::get('/users/corporate-card/print/{id}', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'corp_card_print'])->name('corporate.printed.request');

Route::get('/users/corporate-card/print-history/{id}', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'corp_print_history'])->name('corp.printed.list');

//edit pro

Route::get('/users/corporate-card/profile-list/{id}', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'profile_details_list'])->name('added.profile.list');

Route::get('/users/corporate-card/profile-edit/{id}', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'profile_edit_page'])->name('profile.edit.view');

Route::post('/users/corporate-card/profile-update', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'profile_update'])->name('profile.update');

// Route::get('/users/corporate-card/profile-delete/{id}', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'profile_del'])->name('profile.del');


});


Route::get('/users/corporate-user-card/{id}/{name}', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'corp_card_link'])->name('corp.user.card.link');

Route::get('/users/personal-user-card/{id}/{name}', [App\Http\Controllers\Frontend\Corporate\CorporateController::class, 'personal_card_link'])->name('pers.user.card.link');