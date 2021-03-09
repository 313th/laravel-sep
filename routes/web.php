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
    ->middleware(['web','auth', 'theme:' . env('APP_THEME').',dashboard'])
    ->group(function () {
        /*--Start Payment Routes--*/
        Route::get('/pay',[\sahifedp\Sep\Controllers\PayController::class,'create'])
            ->name('pay.create');
        Route::post('/pay/store',[\sahifedp\Sep\Controllers\PayController::class,'store'])
            ->name('pay.store');
        Route::get('/pay/submit/{token}',[\sahifedp\Sep\Controllers\PayController::class,'submit'])
            ->name('pay.submit');
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
