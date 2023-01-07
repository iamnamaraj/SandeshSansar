<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TopAdController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\HomeAdvertisementController;
use App\Http\Controllers\Front\HomeController as FrontHomeController;

// ---------------------------  Frontend  ------------------------

Route::get('/', [FrontHomeController::class, 'home'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');


// --------------------- Backend ------------------------------


// Admin Authentication

Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::get('/admin/forget-password', [AuthController::class, 'forget_password'])->name('admin.forget-password');
Route::post('/admin/login-submit', [AuthController::class, 'login_submit'])->name('admin.login-submit');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::post('/admin/forget-password/submit', [AuthController::class, 'forget_password_submit'])->name('admin.forget-password.submit');
Route::get('/admin/reset-password/{token}/{email}', [AuthController::class, 'reset_password'])->name('admin.reset-password');
Route::post('/admin/reset-password/submit', [AuthController::class, 'reset_password_submit'])->name('admin.reset-password.submit');

//Admin Dashboard
Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard')->middleware('admin:admin');

//Admin Profile
Route::get('/admin/profile', [ProfileController::class, 'edit_profile'])->name('admin.profile');
Route::post('/admin/profile-submit', [ProfileController::class, 'edit_profile_submit'])->name('admin.profile.submit');

//Advertisements

//home ad
Route::get('/admin/home-ad', [HomeAdvertisementController::class, 'home_ad'])->name('admin.home-ad');
Route::post('/admin/home-ad/submit', [HomeAdvertisementController::class, 'ad_submit'])->name('admin.home-ad.submit');

//Top ad
Route::get('/admin/top-ad', [TopAdController::class, 'top_ad'])->name('admin.top-ad');
Route::post('/admin/top-ad/submit', [TopAdController::class, 'ad_submit'])->name('admin.top-ad.submit');
