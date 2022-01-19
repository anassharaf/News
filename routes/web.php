<?php

use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminCampaignBannerController;
use App\Http\Controllers\Admin\AdminCampaignController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminSocialMediaController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\EndUser\HomeController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;
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

Route::get('test', function () {
    return view('Admin.login');
});


//Route::get('/test',[TestController::class,'index']);

Route::get('admin/login',[AdminAuthController::class,'loginPage'])->name('admin.loginPage')->middleware('guest');
Route::post('admin/login',[AdminAuthController::class,'login'])->name('admin.login');

Route::group(['prefix'=>'admin', 'as'=>'admin.','middleware' => ['auth','activeUser']],function (){
    Route::get('logout',[AdminAuthController::class,'logout'])->name('logout');
    Route::get('/', function () {
        return view('Admin.index');
    });



   Route::group(['prefix'=>'categories' , 'as'=>'categories.'],function (){
      Route::get('/',[AdminCategoryController::class,'index'])->name('all');
      Route::get('create',[AdminCategoryController::class,'create'])->name('create');
      Route::post('store',[AdminCategoryController::class,'store'])->name('store');
      Route::get('edit/{categoryId}',[AdminCategoryController::class,'edit'])->name('edit');
      Route::get('show/{categoryId}',[AdminCategoryController::class,'show'])->name('show');
      Route::put('update',[AdminCategoryController::class, 'update'])->name('update');
      Route::delete('delete',[AdminCategoryController::class,'delete'])->name('delete');
   });


    Route::group(['prefix'=>'social' , 'as'=>'social.'],function (){
        Route::get('/',[AdminSocialMediaController::class,'index'])->name('all');
        Route::get('create',[AdminSocialMediaController::class,'create'])->name('create');
        Route::post('store',[AdminSocialMediaController::class,'store'])->name('store');
        Route::get('edit/{socialId}',[AdminSocialMediaController::class,'edit'])->name('edit');
        Route::put('update',[AdminSocialMediaController::class, 'update'])->name('update');
        Route::delete('delete',[AdminSocialMediaController::class,'delete'])->name('delete');
    });


    Route::group(['prefix'=>'articles' , 'as'=>'articles.'],function (){
        Route::get('/',[AdminArticleController::class,'index'])->name('all');
        Route::get('create',[AdminArticleController::class,'create'])->name('create');
        Route::post('store',[AdminArticleController::class,'store'])->name('store');
        Route::get('edit/{articleId}',[AdminArticleController::class,'edit'])->name('edit');
        Route::get('show/{articleId}',[AdminArticleController::class,'show'])->name('show');
        Route::put('update',[AdminArticleController::class, 'update'])->name('update');
        Route::delete('delete',[AdminArticleController::class,'delete'])->name('delete');
    });


    Route::group(['prefix'=>'contacts' , 'as'=>'contacts.'],function (){
        Route::get('/',[AdminContactController::class,'index'])->name('all');
        Route::get('show/{contactId}',[AdminContactController::class,'show'])->name('show');
        Route::put('update',[AdminContactController::class, 'update'])->name('update');
        Route::delete('delete',[AdminContactController::class,'delete'])->name('delete');
    });



    Route::group(['prefix'=>'users' , 'as'=>'users.'],function (){
        Route::get('/',[AdminUsersController::class,'index'])->name('all');
        Route::get('create',[AdminUsersController::class,'create'])->name('create');
        Route::post('store',[AdminUsersController::class,'store'])->name('store');
        Route::get('edit/{userId}',[AdminUsersController::class,'edit'])->name('edit');
        Route::get('show/{userId}',[AdminUsersController::class,'show'])->name('show');
        Route::get('activate/{userId}',[AdminUsersController::class,'activate'])->name('activate');
        Route::get('deactivate/{userId}',[AdminUsersController::class,'deactivate'])->name('deactivate');
        Route::put('update',[AdminUsersController::class, 'update'])->name('update');
        Route::delete('delete',[AdminUsersController::class,'delete'])->name('delete');
    });


    Route::group(['prefix'=>'banners' , 'as'=>'banners.'],function (){
        Route::get('/',[AdminBannerController::class,'index'])->name('all');
        Route::get('create',[AdminBannerController::class,'create'])->name('create');
        Route::post('store',[AdminBannerController::class,'store'])->name('store');
        Route::get('edit/{bannerId}',[AdminBannerController::class,'edit'])->name('edit');
        Route::get('show/{bannerId}',[AdminBannerController::class,'show'])->name('show');
        Route::put('update',[AdminBannerController::class, 'update'])->name('update');
        Route::delete('delete',[AdminBannerController::class,'delete'])->name('delete');
    });


    Route::group(['prefix'=>'campaigns' , 'as'=>'campaigns.'],function (){
        Route::get('/',[AdminCampaignController::class,'index'])->name('all');
        Route::get('create',[AdminCampaignController::class,'create'])->name('create');
        Route::post('store',[AdminCampaignController::class,'store'])->name('store');
        Route::get('edit/{campaignId}',[AdminCampaignController::class,'edit'])->name('edit');
        Route::get('show/{campaignId}',[AdminCampaignController::class,'show'])->name('show');
        Route::get('change-status/{campaignId}',[AdminCampaignController::class,'changeStatus'])->name('change-status');
        Route::put('update',[AdminCampaignController::class, 'update'])->name('update');
        Route::delete('delete',[AdminCampaignController::class,'delete'])->name('delete');
    });


    Route::group(['prefix'=>'campaign/banners' , 'as'=>'campaign-banners.'],function (){
        Route::get('{campaignId}/create',[AdminCampaignBannerController::class,'create'])->name('create');
        Route::post('store',[AdminCampaignBannerController::class,'store'])->name('store');
        Route::delete('delete',[AdminCampaignBannerController::class,'delete'])->name('delete');
    });

});

Route::group([],function (){
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/{categoryName}/{articleId}',[HomeController::class,'showArticle'])->name('article.show');
    Route::get('contact-us',[HomeController::class,'contactPage'])->name('contactPage');
    Route::post('contact-us',[HomeController::class,'storeContact'])->name('storeContact');
    Route::get('{categoryName}',[HomeController::class,'categoryPage'])->name('categoryPage');



});


