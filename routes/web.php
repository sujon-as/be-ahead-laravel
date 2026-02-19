<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CauseController;
use App\Http\Controllers\CauseTitleController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryImageController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\MissionTitleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTitleController;
use App\Http\Controllers\RecentCauseController;
use App\Http\Controllers\RecentCauseTitleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\WhyChooseUsController;
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

    // Causes
    Route::resource('front-causes', CauseController::class);
    Route::resource('cause-titles', CauseTitleController::class);

    // Recent Causes
    Route::resource('recent-cause-titles', RecentCauseTitleController::class);
    Route::resource('front-recent-causes', RecentCauseController::class);

    // Why Choose Us
    Route::resource('why-choose-us', WhyChooseUsController::class);

    // About Us
    Route::resource('about-us', AboutUsController::class);

    // Gallery
    Route::resource('galleries', GalleryController::class);

    // Gallery Category
    Route::resource('gallery-categories', GalleryCategoryController::class);

    // Gallery Image
    Route::resource('gallery-images', GalleryImageController::class);

    // Mission Titles
    Route::resource('mission-titles', MissionTitleController::class);

    // Mission
    Route::resource('missions', MissionController::class);

    // Project Titles
    Route::resource('project-titles', ProjectTitleController::class);

    // Project
    Route::resource('projects', ProjectController::class);

    // Volunteers
    Route::resource('volunteers', VolunteerController::class);
    Route::post('volunteer-status-update', [VolunteerController::class, 'volunteerStatusUpdate'])
        ->name('volunteer-status-update');

});

require __DIR__.'/front.php';
