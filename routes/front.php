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
Route::get('/appointment', [FrontController::class, 'appointment'])->name('appointment');
Route::get('/donation', [FrontController::class, 'donation'])->name('donation');
Route::get('/faq', [FrontController::class, 'faq'])->name('faq');

// Ajax routes
Route::get('/ajax/home-gallery/all', [FrontController::class, 'homeGalleryAll']);
Route::get('/ajax/home-gallery/category/{id}', [FrontController::class, 'homeGalleryByCategory']);



