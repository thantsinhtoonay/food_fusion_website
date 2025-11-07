<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CookieController;

Route::get('/', [PageController::class,'home'])->name('home');
Route::get('/about', [PageController::class,'about'])->name('about');
Route::get('/contact', [PageController::class,'contact'])->name('contact');
Route::post('/contact/send', [ContactController::class,'send'])->name('contact.send');

Route::get('/recipes', [RecipeController::class,'index'])->name('recipes.index');
Route::get('/recipes/create', [RecipeController::class,'create'])->middleware('auth')->name('recipes.create');
Route::post('/recipes', [RecipeController::class,'store'])->middleware('auth')->name('recipes.store');
Route::get('/recipes/{id}', [RecipeController::class,'show'])->name('recipes.show');
Route::get('/recipes/{id}/edit', [RecipeController::class,'edit'])->middleware('auth')->name('recipes.edit');
Route::put('/recipes/{id}', [RecipeController::class,'update'])->middleware('auth')->name('recipes.update');
Route::delete('/recipes/{id}', [RecipeController::class,'destroy'])->middleware('auth')->name('recipes.destroy');

Route::get('/community', [CommunityController::class,'index'])->name('community.index');
Route::get('/community/submit', [CommunityController::class,'create'])->middleware('auth')->name('community.create');
Route::post('/community/submit', [CommunityController::class,'store'])->middleware('auth')->name('community.store');
Route::get('/community/{id}', [CommunityController::class,'show'])->name('community.show');
Route::post('/community/{id}/approve', [CommunityController::class,'approve'])->middleware('auth')->name('community.approve');
Route::post('/community/{id}/reject', [CommunityController::class,'reject'])->middleware('auth')->name('community.reject');

Route::get('/resources', [ResourceController::class,'index'])->name('resources.index');
Route::get('/education', [ResourceController::class,'education'])->name('resources.education');

# Auth
Route::get('/register', [AuthController::class,'showRegister'])->name('register');
Route::post('/register', [AuthController::class,'register']);
Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth')->name('logout');

# Cookie accept
Route::post('/cookie/accept', [CookieController::class,'accept'])->name('cookie.accept');
