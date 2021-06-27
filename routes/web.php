<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\LivetvController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\PrayerController;
use App\Http\Controllers\Backend\SeoController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Backend\SubCategoriesController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\Home\SiteController;
use App\Http\Controllers\Backend\RoleController;
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

Route::get('/', [SiteController::class, 'index'])->name('site.home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.admin');
})->name('dashboard');

// ----------------- Logout -----------------//
Route::post('/logout', [AdminController::class,'logout'])->name('logout');



// ----------------- Category -----------------//
Route::resource('dashboard/category', CategoryController::class)->except(['show']);

// ----------------- Sub Category -----------------//
Route::resource('dashboard/subcategory', SubCategoriesController::class)->except(['show']);

// ----------------- District -----------------//
Route::resource('dashboard/district', DistrictController::class)->except(['show']);

// ----------------- Sub District -----------------//
Route::resource('dashboard/subdistrict', SubDistrictController::class)->except(['show']);

// ----------------- Post -----------------//
Route::resource('dashboard/post', PostController::class)->except(['show']);

Route::get('/get/subcategory/{category_id}', [PostController::class, 'GetSubCategory']);

Route::get('/get/subdistrict/{district_id}', [PostController::class, 'GetSubDistrict']);

// ----------------- Social Media -----------------//
Route::resource('dashboard/social', SocialController::class)->except(['show']);

// ----------------- SEO Site -----------------//
Route::get('dashboard/seo',[SeoController::class,'create'])->name('seo.create');
Route::post('dashboard/seo/{id}',[SeoController::class,'update'])->name('seo.update');

// ----------------- Prayer Site -----------------//
Route::get('dashboard/prayer',[PrayerController::class, 'create'])->name('prayer.create');
Route::post('dashboard/prayer/{id}',[PrayerController::class, 'update'])->name('prayer.update');

// ----------------- Live Tv -----------------//
Route::get('dashboard/livetv',[LivetvController::class, 'create'])->name('livetv.create');
Route::post('dashboard/livetv/{id}',[LivetvController::class, 'update'])->name('livetv.update');

// ----------------- Notice -----------------//
Route::get('dashboard/notice',[NoticeController::class, 'create'])->name('notice.create');
Route::post('dashboard/notice/{id}',[NoticeController::class, 'update'])->name('notice.update');

// ----------------- Photos -----------------// 
Route::resource('dashboard/photo', PhotoController::class)->except(['show']);

// ----------------- FrontEnd Multi Language -----------------// 
Route::get('lang/en',[SiteController::class, 'en'])->name('lang.en');
Route::get('lang/fa',[SiteController::class, 'fa'])->name('lang.fa');

Route::get('view/post/{id}', [SiteController::class, 'show'])->name('site.show');

// ----------------- Posts By Category And SubCategory -----------------// 
Route::get('catpost/{id}/{category_en}', [SiteController::class, 'catpost']);
Route::get('subcategory/{id}/{subcategory_en}',[SiteController::class, 'subcatpost']);

// ----------------- Create User & Role Permission -----------------// 
Route::resource('dashboard/writer',RoleController::class);

// ----------------- Acount Setting -----------------//
Route::get('account/setting', [AdminController::class,'AccountSetting'])->name('account.setting');