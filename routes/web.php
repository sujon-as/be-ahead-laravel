<?php

use App\Http\Controllers\FeatureController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\DashboardController;
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

Route::get('/admin/login', [IndexController::class, 'loginPage'])->name('login-admin');

Route::post('admin-login', [AccessController::class, 'adminLogin'])->name('admin-login');

Route::get('/logout', [AccessController::class, 'Logout']);

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize');

    return 'All caches (config, route, view, optimize) have been cleared!';
});

Route::group(['middleware' => ['prevent-back-history', 'admin_auth']], function () {
    // admin dashboard
    Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard');

    // Settings
    Route::get('/settings', [SettingController::class, 'settings'])->name('settings');
    Route::post('settings-app', [SettingController::class, 'settingApp'])->name('settings-app');

    // Sliders
    Route::resource('sliders', SliderController::class);
    Route::post('slider-status-update', [SliderController::class, 'sliderStatusUpdate'])->name('slider-status-update');

    // Features
    Route::resource('features', FeatureController::class);
    Route::post('feature-status-update', [FeatureController::class, 'featureStatusUpdate'])->name('feature-status-update');
});

require __DIR__.'/front.php';
