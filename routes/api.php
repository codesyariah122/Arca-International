<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/test', function(){
	return 'Hallo';
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/check_register/{id}', [RegisterController::class, 'check_register']);

Route::put('/activation/{id}', [RegisterController::class, 'activation'])->name('activation.user');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:api');

Route::get('/detail/user/{id}', [LoginController::class, 'details']);

Route::post('/send/email', [SendConfirmationEmailController::class, 'sending_mail']);

Route::resource('/employee', EmployeeController::class);

Route::post('/employee/projects', [EmployeeController::class, 'projects']);

Route::get('/add/team', [EmployeeController::class, 'add_teams']);

Route::get('/detail/projects/{name}', [EmployeeController::class, 'detail_project']);
