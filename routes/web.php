<?php

use App\Models\TypeService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\TypeServiceController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SenddocumentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ManageUserStatusController;
use App\Http\Controllers\RegisterController as ControllersRegisterController;

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
    $typeServices = TypeService::all();
    return view('welcome', [
        'typeServices' => $typeServices
    ]);
});

// Auth::routes();


Route::get('/accueil', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::post('/connect', [LoginController::class, 'connection'])->name('connection');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', [RegistrationController::class, 'registerRender'])->name('register.view');
Route::get('/userlist', [ManageUserStatusController::class, 'userlistRender'])->name('userlist.view');
Route::get('/manageStatus/{user}', [ManageUserStatusController::class, 'switchUserStatus'])->name('switchUserStatus');
Route::post('/register', [RegistrationController::class, 'registerSubmit'])->name('register.submit');
Route::get('/users/{id}', [RegistrationController::class, 'profilRender'])->name('users.profil');
Route::post('/user/{id}/avatar', [RegistrationController::class, 'uploadAvatar'])->name('avatar.submit');
Route::get('document-pret', [DocumentController::class, 'loanview'])->name('loanview');
Route::get('/type_services/{id}', [ServiceController::class, 'serviceByType'])->name('services.type');
Route::get('/type_services', [TypeServiceController::class, 'listeTypeServices'])->name('liste.typeservice');
Route::get('/edit_typeservices/{id}', [TypeServiceController::class, 'editTypeService'])->name('edit.typeservice');
Route::post('/edit_typeservices/{id}', [TypeServiceController::class, 'editTypeServiceSubmission'])->name('edittypeservice.submit');
Route::get('/delete_typeservices/{id}', [TypeServiceController::class, 'deleteTypeService'])->name('delete.typeservice');
Route::get('/new_type_services', [TypeServiceController::class, 'newTypeServiceView'])->name('add.typeservice');
Route::get('/new_services', [ServiceController::class, 'newServiceView'])->name('add.service');
Route::post('/new_type_services', [TypeServiceController::class, 'newTypeService'])->name('submit.typeservice');
Route::post('/new_services', [ServiceController::class, 'newService'])->name('submit.service');
Route::get('/documents/loan', [DocumentController::class, 'loadloan'])->name('documents.loan');
Route::get('/documents/sendform', [SenddocumentController::class, 'index'])->name('documents.sendform');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{id}', [ServiceController::class, 'editServiceView'])->name('services.view');
Route::post('/services/{id}', [ServiceController::class, 'editService'])->name('editservices.submit');
Route::get('/deleteservices/{id}', [ServiceController::class, 'deleteService'])->name('deleteService');
Route::get('loan', [LoanController::class, 'index'])->name('Loan.form');
Route::post('loan-register', [LoanController::class, 'loanRegister'])->name('loan.register');
Route::get('loans/{id}/edit', [LoanController::class, 'updateform'])->name('edit.loan');
Route::post('loans/{id}/update', [LoanController::class, 'updateloan'])->name('update.loan');
Route::get('loans/{id}/delete', [LoanController::class, 'destroy'])->name('delete.loan');
Route::get('loans/list', [LoanController::class, 'listloan'])->name('list.loan');
Route::get('loans/{id}/status', [LoanController::class, 'switchLoanStatus'])->name('statuschange.loan');
Route::get('add_investment', [InvestmentController::class, 'investmentForm'])->name('Investment.form');
Route::post('investments', [InvestmentController::class, 'create'])->name('Investment.submit');
Route::get('add_saving', [SavingController::class, 'investmentForm'])->name('Saving.form');
Route::get('investments', [InvestmentController::class, 'index'])->name('investments.index');
Route::post('documents/submit', [SenddocumentController::class, 'senddocument'])->name('documents.submit');
