<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/causes', [FrontController::class, 'causes'])->name('causes');
Route::get('/events', [FrontController::class, 'events'])->name('events');
Route::get('/gallery', [FrontController::class, 'gallery'])->name('gallery');
Route::get('/team', [FrontController::class, 'team'])->name('team');
Route::get('/volunteer', [FrontController::class, 'volunteer'])->name('volunteer');
Route::get('/appointment', [FrontController::class, 'appointment'])->name('appointment');
Route::get('/donation', [FrontController::class, 'donation'])->name('donation');
Route::get('/faq', [FrontController::class, 'faq'])->name('faq');
Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
Route::get('/latest-news', [FrontController::class, 'news'])->name('latest-news');

// Ajax routes
Route::get('/ajax/home-gallery/all', [FrontController::class, 'homeGalleryAll']);
Route::get('/ajax/home-gallery/category/{id}', [FrontController::class, 'homeGalleryByCategory']);

Route::post('/volunteer-reg', [FrontController::class, 'volunteerReg'])->name('volunteer-reg');
Route::post('/appointment-submit', [FrontController::class, 'appointmentSubmit'])->name('appointment-submit');
Route::post('/message-submit', [FrontController::class, 'messageSubmit'])->name('message-submit');
Route::post('/donation-submit', [FrontController::class, 'donationSubmit'])->name('donation-submit');

Route::get('/cause/{id}', [FrontController::class, 'causeDetails'])
    ->name('cause.details');

Route::get('/recentCause/{id}', [FrontController::class, 'recentCauseDetails'])
    ->name('recentCause.details');

Route::get('/project/{id}', [FrontController::class, 'projectDetails'])
    ->name('project.details');

Route::get('/mission/{id}', [FrontController::class, 'missionDetails'])
    ->name('mission.details');

Route::get('/team-details/{id}', [FrontController::class, 'teamDetails'])
    ->name('team.details');

Route::get('/vision-details', [FrontController::class, 'visionDetails'])
    ->name('vision.details');

Route::get('/blog-details/{id}', [FrontController::class, 'blogDetails'])
    ->name('blog.details');

Route::get('/news-details/{id}', [FrontController::class, 'newsDetails'])
    ->name('news.details');



