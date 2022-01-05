<?php

use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return view('EndUser.index');
});
Route::get('/a', function () {
    return view('Admin.index');
});

//Route::get('/test',[TestController::class,'index']);

Route::group(['prefix'=>'admin', 'as'=>'admin.'],function (){
   Route::group(['prefix'=>'categories' , 'as'=>'categories.'],function (){
      Route::get('/',[AdminCategoryController::class,'index'])->name('all');
      Route::get('create',[AdminCategoryController::class,'create'])->name('create');
      Route::post('store',[AdminCategoryController::class,'store'])->name('store');
      Route::get('edit/{categoryId}',[AdminCategoryController::class,'edit'])->name('edit');
      Route::get('show/{categoryId}',[AdminCategoryController::class,'show'])->name('show');
      Route::put('update',[AdminCategoryController::class, 'update'])->name('update');
      Route::delete('delete',[AdminCategoryController::class,'delete'])->name('delete');
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

});
