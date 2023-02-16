<?php

use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ActualUseController;
use App\Http\Controllers\AdditionalItemController;
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
//     return redirect('index');
// });

$menu = theme()->getMenu();
array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);

        // Exclude documentation from auth middleware
        if (!Str::contains($val['path'], 'documentation')) {
            $route->middleware('auth');
        }
    }
});

// Documentations pages
Route::prefix('documentation')->group(function () {
    Route::get('getting-started/references', [ReferencesController::class, 'index']);
    Route::get('getting-started/changelog', [PagesController::class, 'index']);
});

Route::middleware('auth')->group(function () {
    // Account pages
    Route::prefix('account')->group(function () {
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
        Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
        Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
    });

    // Logs pages
    Route::prefix('log')->name('log.')->group(function () {
        Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
        Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
    });
});

Route::resource('users', UsersController::class);

//Actual Use
Route::get('/actual-uses', [ActualUseController::class, 'index'])->name('actual-uses');
Route::get('/actual-use/create', [ActualUseController::class, 'create'])->name('create-actual-use');
Route::post('/actual-use/store', [ActualUseController::class, 'store'])->name('store-actual-use');
Route::get('/actual-use/show/{actual_use}', [ActualUseController::class, 'show'])->name('show-actual-use');
Route::get('/actual-use/edit/{actual_use}', [ActualUseController::class, 'edit'])->name('edit-actual-use');
Route::put('/actual-use/update/{actual_use}', [ActualUseController::class, 'update'])->name('update-actual-use');
Route::delete('/actual-use/destroy/{actual_use}', [ActualUseController::class, 'destroy'])->name('destroy-actual-use');
Route::post('/actual-uses/batch-destroy', [ActualUseController::class, 'batchDestroy'])->name('batch-destroy-actual-uses');

//Additional Item
Route::get('/items', [AdditionalItemController::class, 'index'])->name('items');
Route::get('/item/create', [AdditionalItemController::class, 'create'])->name('create-item');
Route::post('item/store', [AdditionalItemController::class, 'store'])->name('store-item');
Route::get('/item/show/{item}', [AdditionalItemController::class, 'show'])->name('show-item');
Route::get('/item/edit/{item}', [AdditionalItemController::class, 'edit'])->name('edit-item');
Route::put('/item/update/{item}', [AdditionalItemController::class, 'update'])->name('update-item');
Route::delete('/item/destroy/{item}', [AdditionalItemController::class, 'destroy'])->name('destroy-item');
Route::post('/item/batch-destroy', [AdditionalItemController::class, 'batchDestroy'])->name('batch-destroy-items');

/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

require __DIR__.'/auth.php';
