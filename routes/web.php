<?php

use App\Http\Controllers\CompanyManagementController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuoteManagementController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return redirect()->route('home');
// });

Auth::routes();
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id?}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/', [FrontendController::class, 'index'])->name('welcome');
Route::get('/faq', [FrontendController::class, 'faqIndex'])->name('faq');
Route::get('/contact_us', [FrontendController::class, 'contactusIndex'])->name('contactus');
Route::post('/contact_us', [ContactusController::class, 'storeContactMessage'])->name('store.contact.us');

Route::post('/registrations', [HomeController::class, 'manuallRegistrations'])->name('user.manual.registrations');


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
*/
// Route::group(['prefix' => 'user'], function () {
//     Route::get('/profile', [UserController::class, 'profileIndex'])->name('user.profile');
//     Route::post('/profile', [UserController::class, 'updateCompanyProfile'])->name('company.profile.update');
//     Route::post('/pricing', [UserController::class, 'updateCompanyPricing'])->name('company.pricing.update');
// });

// Auth::routes(['verify'=>false]);


Route::group(['middleware' => ['auth','verified']], function () {

    // end user actions
    Route::get('/get_quotation/{company?}', [FrontendController::class, 'getQuote'])->name('quotation');
    Route::get('/pricing_plans', [FrontendController::class, 'pricingPlanIndex'])->name('pricingplan');
    Route::get('/companies_list', [FrontendController::class, 'companiesList'])->name('companies.list');
    Route::get('/company_detail/{id}', [FrontendController::class, 'companyDetail'])->name('companies.detail');
    Route::get('/company_hiring/{id}', [FrontendController::class, 'hiringForm'])->name('companies.hiring.form');
    Route::post('/company_hiring', [FrontendController::class, 'userHiringDetail'])->name('companies.hiring.form.submit');
    Route::get('/company_quotation/{token}', [FrontendController::class, 'getCompanyQuotationForm'])->name('companies.quotation');


    // order management block
    Route::post('create_order', [CompanyManagementController::class, 'createOrder'])->name('company.create.order');



    // main roles actions and dashboards management.
    Route::resource('users', 'UserController');
    Route::get('/users/{user?}', 'UserController@profile')->name('users.index');
    Route::get('/profile/{user}', 'UserController@profile')->name('profile.edit');
    Route::post('/profile/{user}', 'UserController@profileUpdate')->name('profile.update');
    Route::resource('roles', 'RoleController')->except('show');
    Route::resource('permissions', 'PermissionController')->except(['show','destroy','update']);

    Route::group(['prefix' => 'user'], function () {
        Route::get('/dashboard', 'DashboardController@userDashboard')->name('user.dashboard');
    });
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', 'DashboardController@adminDashboard')->name('admin.dashboard');

        Route::get('/profile', [QuoteManagementController::class, 'profileIndex'])->name('user.profile');
        Route::post('/profile', [QuoteManagementController::class, 'updateCompanyProfile'])->name('company.profile.update');
        Route::post('/pricing', [QuoteManagementController::class, 'updateCompanyPricing'])->name('company.pricing.update');
    });
    Route::group(['prefix' => 'super_admin'], function () {
        Route::get('/dashboard', 'DashboardController@superAdminDashboard')->name('super.admin.dashboard');

        Route::group(['as' => 'order.'], function () {
            Route::get('order_list', [CompanyManagementController::class, 'orderList'])->name('list');
        });
    });

    Route::get('/home', 'HomeController@index')->name('home');
});
