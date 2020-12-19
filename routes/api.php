<?php

use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\VerificationController;
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


Route::middleware(['auth:sanctum'])
     ->name('api')
     ->group(function () {
	     Route::prefix('account')
	          ->group(function () {
		          /**
		           * verification
		           */
		          Route::prefix('verification')
		               ->group(function () {
			               Route::delete('/', [VerificationController::class, 'revocation']);
			               Route::post('/', [VerificationController::class, 'store'])
			                    ->withoutMiddleware('auth:sanctum');
		               });

		          /**
		           * account
		           */
		          Route::apiResource('/', AccountController::class);
	          });
     });

