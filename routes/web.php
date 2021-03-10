<?php
use Illuminate\Support\Facades\Route;
use Facuz\Theme\Facades\Theme;

/*
|--------------------------------------------------------------------------
| Sep Functions Routes
|--------------------------------------------------------------------------
*/
Route::prefix('sep')
    ->name('sep.')
    ->middleware(['web', 'theme:' . env('APP_THEME').',layout'])
    ->group(function () {
        /*--Start Payment Routes--*/
        Route::get('/pay',[\sahifedp\Sep\Controllers\PayController::class,'create'])
            ->name('pay.create');
        Route::post('/pay/store',[\sahifedp\Sep\Controllers\PayController::class,'store'])
            ->name('pay.store');
        Route::get('/pay/submit/{token}',[\sahifedp\Sep\Controllers\PayController::class,'submit'])
            ->name('pay.submit');
        /*--Callback Routes--*/
        Route::post('/callback/{id}',[\sahifedp\Sep\Controllers\CallbackController::class,'update'])
            ->name('callback');
        Route::get('/result/{id}',[\sahifedp\Sep\Controllers\CallbackController::class,'result'])
            ->name('result');
    });
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
//Route::group(['middleware'=>['web','auth']],function (){
//    Route::get('/'.env('ADMIN_URL'), [sahifedp\Sep\Controllers\Admin\DefaultController::class, 'dashboard'])
//    ->name('admin.dashboard');
//});

Route::get('/'.env('ADMIN_URL'), [sahifedp\Sep\Controllers\Admin\DefaultController::class, 'dashboard'])
    ->middleware(['web','auth', 'theme:' . env('ADMIN_THEME')])
    ->name('admin.dashboard');
