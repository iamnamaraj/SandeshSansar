<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\TagController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PollController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Front\VoteController;
use App\Http\Controllers\Admin\TopAdController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Front\ArchiveController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SidebarAdController;
use App\Http\Controllers\Front\DisclaimerController;
use App\Http\Controllers\Front\SubscriberController;
use App\Http\Controllers\Admin\LiveChannelController;
use App\Http\Controllers\Admin\SocialmediaController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\HomeAdvertisementController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Front\HomeController as FrontHomeController;
use App\Http\Controllers\Front\PostController as FrontPostController;
use App\Http\Controllers\Admin\SubscriberController as AdminSubscriberController;
use App\Http\Controllers\Author\HomeController as AuthorHomeController;
use App\Http\Controllers\Author\PostController as AuthorPostController;
use App\Http\Controllers\Author\ProfileController as AuthorProfileController;
use App\Http\Controllers\Front\SubcategoryController as FrontSubcategoryController;

// ---------------------------  Frontend  ------------------------

Route::get('/', [FrontHomeController::class, 'home'])->name('home');

//pages
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/terms', [TermsController::class, 'index'])->name('terms');
Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('/disclaimer', [DisclaimerController::class, 'index'])->name('disclaimer');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send_email', [ContactController::class, 'send_email'])->name('contact.send_email');


//post view
Route::get('/posts/{id}', [FrontPostController::class, 'view'])->name('front.post.view');

//view all post of category
Route::get('/subcats/{id}', [FrontSubcategoryController::class, 'view'])->name('subcats.view');

//Subscriber(Newsletter section)

Route::post('/subscriber/send-email', [SubscriberController::class, 'send_email'])->name('subscriber.send-email');
Route::get('subscriber/verify/{token}/{email}', [SubscriberController::class, 'verify'])->name('subscriber.verify');

//vote controller
Route::post('/vote/submit', [VoteController::class, 'submit'])->name('vote.submit');
Route::get('/vote/previous', [VoteController::class, 'previous'])->name('vote.previous');

//Archive controller
Route::post('/archive/post', [ArchiveController::class, 'show'])->name('archive.show');
Route::get('/archive/{month}/{year}', [ArchiveController::class, 'detail'])->name('archive.detail');

//TagController
Route::get('/tag/{tagname}', [TagController::class, 'show'])->name('tag.show');

//get subcategory by choosing category
Route::get('/subcategory-by-category/{id}', [FrontHomeController::class, 'subcategory'])->name('subcategory.get');

//searching
Route::post('/search/result', [FrontHomeController::class, 'search'])->name('search.item');




// -------------------Author Section-------------------------------

//Author login section
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/submit', [LoginController::class, 'login_submit'])->name('author.login-submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('author.logout');

//password reset
Route::get('/forget-password', [LoginController::class, 'forget_password'])->name('author.forget-password');
Route::post('/forget-password/submit', [LoginController::class, 'forget_password_submit'])->name('author.forget-password.submit');
Route::get('/reset-password/{token}/{email}', [LoginController::class, 'reset_password'])->name('author.reset-password');
Route::post('/reset-password/submit', [LoginController::class, 'reset_password_submit'])->name('author.reset_password.submit');


//author dashboard
Route::get('/author/dashboard', [AuthorHomeController::class, 'dashboard'])->name('author.dashboard')->middleware('author:author');


//author profile
Route::get('/author/profile', [AuthorProfileController::class, 'profile'])->name('author.profile')->middleware('author:author');
Route::post('/author/profile/update', [AuthorProfileController::class, 'profile_update'])->name('author.profile.update')->middleware('author:author');

//author post controller
Route::get('/author/post', [AuthorPostController::class, 'index'])->name('author.post');
Route::get('/author/post/create', [AuthorPostController::class, 'create'])->name('author.post.create');
Route::post('/author/post/store', [AuthorPostController::class, 'store'])->name('author.post.store');
Route::get('/author/post/edit/{id}', [AuthorPostController::class, 'edit'])->name('author.post.edit');
Route::post('/author/post/update/{id}', [AuthorPostController::class, 'update'])->name('author.post.update');
Route::get('/author/post/delete/{id}', [AuthorPostController::class, 'delete'])->name('author.post.delete');
Route::get('/author/post/tag/{id}/{id1}', [AuthorPostController::class, 'tag_delete'])->name('author.tag.delete');











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


//Advertisements section
//home ad
Route::get('/admin/home-ad', [HomeAdvertisementController::class, 'home_ad'])->name('admin.home-ad');
Route::post('/admin/home-ad/submit', [HomeAdvertisementController::class, 'ad_submit'])->name('admin.home-ad.submit');

//Top ad
Route::get('/admin/top-ad', [TopAdController::class, 'top_ad'])->name('admin.top-ad');
Route::post('/admin/top-ad/submit', [TopAdController::class, 'ad_submit'])->name('admin.top-ad.submit');

//Sidebar Ad
Route::get('/admin/sidebar-ad', [SidebarAdController::class, 'index'])->name('admin.sidebar-ad');
Route::get('/admin/sidebar-ad/create', [SidebarAdController::class, 'create'])->name('admin.sidebar-ad.create');
Route::post('/admin/sidebar-ad/store', [SidebarAdController::class, 'store'])->name('admin.sidebar-ad.store');
Route::get('/admin/sidebar-ad/edit/{id}', [SidebarAdController::class, 'edit'])->name('admin.sidebar-ad.edit');
Route::post('/admin/sidebar-ad/update/{id}', [SidebarAdController::class, 'update'])->name('admin.sidebar-ad.update');
Route::get('/admin/sidebar-ad/delete/{id}', [SidebarAdController::class, 'delete'])->name('admin.sidebar-ad.delete');

//Category
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::post('/admin/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::get('/admin/categories/delete/{id}', [CategoryController::class, 'delete'])->name('admin.categories.delete');


//sub category
Route::get('/admin/sub-categories', [SubCategoryController::class, 'index'])->name('admin.sub-categories');
Route::get('/admin/sub-categories/create', [SubCategoryController::class, 'create'])->name('admin.sub-categories.create');
Route::post('/admin/sub-categories/store', [SubCategoryController::class, 'store'])->name('admin.sub-categories.store');
Route::get('/admin/sub-categories/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin.sub-categories.edit');
Route::post('/admin/sub-categories/update/{id}', [SubCategoryController::class, 'update'])->name('admin.sub-categories.update');
Route::get('/admin/sub-categories/delete/{id}', [SubCategoryController::class, 'delete'])->name('admin.sub-categories.delete');

//Post Controller
Route::resource('admin/posts', PostController::class);
Route::get('admin/posts/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');
Route::get('admin/posts/tag/{id}/{id1}', [PostController::class, 'tag_delete'])->name('posts.tag.delete');


//settings

Route::get('/admin/settings/', [SettingController::class, 'index'])->name('admin.settings');
Route::post('/admin/settings/update', [SettingController::class, 'update'])->name('admin.settings.update');


//Pages section

//about page
Route::get('/admin/pages/about', [PageController::class, 'about'])->name('admin.about');
Route::post('/admin/pages/update', [PageController::class, 'about_update'])->name('admin.about.update');

//Faq page
Route::get('/admin/pages/faq', [PageController::class, 'faq'])->name('admin.page.faq');
Route::post('/admin/pages/faq/update', [PageController::class, 'faq_update'])->name('admin.page.faq.update');

//Terms & Conditions  page
Route::get('/admin/pages/terms', [PageController::class, 'terms'])->name('admin.terms');
Route::post('/admin/pages/terms/update', [PageController::class, 'terms_update'])->name('admin.terms.update');

//policy & privacies  page
Route::get('/admin/pages/privacy', [PageController::class, 'privacy'])->name('admin.privacy');
Route::post('/admin/pages/privacy/update', [PageController::class, 'privacy_update'])->name('admin.privacy.update');

//Disclaimer  page
Route::get('/admin/pages/disclaimer', [PageController::class, 'disclaimer'])->name('admin.disclaimer');
Route::post('/admin/pages/disclaimer/update', [PageController::class, 'disclaimer_update'])->name('admin.disclaimer.update');

//login  page
Route::get('/admin/pages/login', [PageController::class, 'login'])->name('admin.page.login');
Route::post('/admin/pages/login/update', [PageController::class, 'login_update'])->name('admin.login.update');

//contact  page
Route::get('/admin/pages/contact', [PageController::class, 'contact'])->name('admin.contact');
Route::post('/admin/pages/contact/update', [PageController::class, 'contact_update'])->name('admin.contact.update');


//FAQ contoller
Route::get('/admin/faq', [AdminFaqController::class, 'faq'])->name('admin.faq');
Route::get('/admin/faq/create', [AdminFaqController::class, 'create'])->name('admin.faq.create');
Route::Post('/admin/faq/store', [AdminFaqController::class, 'store'])->name('admin.faq.store');
Route::get('/admin/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin.faq.edit');
Route::post('/admin/faq/update/{id}', [AdminFaqController::class, 'update'])->name('admin.faq.update');
Route::get('/admin/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin.faq.delete');


//Admin subscribers
Route::get('/admin/subscribers', [AdminSubscriberController::class, 'index'])->name('admin.subscriber');
Route::get('/admin/subscribers/mail', [AdminSubscriberController::class, 'mail'])->name('admin.subscriber.mail');
Route::post('/admin/subscribers/mail/send', [AdminSubscriberController::class, 'mail_send'])->name('admin.subscriber.mail.send');

//live channel
Route::get('/admin/live', [LiveChannelController::class, 'index'])->name('admin.live');
Route::get('/admin/live/create', [LiveChannelController::class, 'create'])->name('admin.live.create');
Route::post('/admin/live/store', [LiveChannelController::class, 'store'])->name('admin.live.store');
Route::get('/admin/live/edit/{id}', [LiveChannelController::class, 'edit'])->name('admin.live.edit');
Route::post('/admin/live/update/{id}', [LiveChannelController::class, 'update'])->name('admin.live.update');
Route::get('/admin/live/delete/{id}', [LiveChannelController::class, 'delete'])->name('admin.live.delete');

//poll vote
Route::get('/admin/poll', [PollController::class, 'index'])->name('admin.poll');
Route::get('/admin/poll/create', [PollController::class, 'create'])->name('admin.poll.create');
Route::post('/admin/poll/store', [PollController::class, 'store'])->name('admin.poll.store');
Route::get('/admin/poll/edit/{id}', [PollController::class, 'edit'])->name('admin.poll.edit');
Route::post('/admin/poll/update/{id}', [PollController::class, 'update'])->name('admin.poll.update');
Route::get('/admin/poll/delete/{id}', [PollController::class, 'delete'])->name('admin.poll.delete');


//Social media
Route::get('/admin/social_media', [SocialmediaController::class, 'index'])->name('admin.social_media');
Route::get('/admin/social_media/create', [SocialmediaController::class, 'create'])->name('admin.social_media.create');
Route::post('/admin/social_media/store', [SocialmediaController::class, 'store'])->name('admin.social_media.store');
Route::get('/admin/social_media/edit/{id}', [SocialmediaController::class, 'edit'])->name('admin.social_media.edit');
Route::post('/admin/social_media/update/{id}', [SocialmediaController::class, 'update'])->name('admin.social_media.update');
Route::get('/admin/social_media/delete/{id}', [SocialmediaController::class, 'delete'])->name('admin.social_media.delete');

//Author Controller
Route::get('/admin/author', [AuthorController::class, 'index'])->name('admin.author');
Route::get('/admin/author/create', [AuthorController::class, 'create'])->name('admin.author.create');
Route::post('/admin/author/store', [AuthorController::class, 'store'])->name('admin.author.store');
Route::get('/admin/author/edit/{id}', [AuthorController::class, 'edit'])->name('admin.author.edit');
Route::post('/admin/author/update/{id}', [AuthorController::class, 'update'])->name('admin.author.update');
Route::get('/admin/author/delete/{id}', [AuthorController::class, 'delete'])->name('admin.author.delete');
