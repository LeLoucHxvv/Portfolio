<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\WelcomeController;
use App\Models\Blog;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',  [App\Http\Controllers\WelcomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/resume', [App\Http\Controllers\ResumeController::class, 'resume'])->name('menu.resume.index');

//Route for welcome
Route::get('/welcome', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::post('/welcome/store', [App\Http\Controllers\WelcomeController::class, 'store'])->name('welcome.store');

Route::get('/welcome/resume', [App\Http\Controllers\ResumeWelcomeController::class, 'index'])->name('welcome.resume');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('menu.contact.index');
Route::delete('/contact/destroy/{id}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('menu.contact.destroy');

Route::middleware('custom')->group(function () {
    Route::resource('/cv', BlogController::class);
    Route::resource('/portfolio', PortfolioController::class);
    Route::resource('/experience', ExperienceController::class);
    Route::resource('/education', EducationController::class);
    Route::resource('/social-media', SocialMediaController::class);
    Route::resource('/my-profile', ProfileController::class);
    Route::resource('/skill', SkillController::class);
    Route::get('/download/{filename}', [WelcomeController::class, 'download'])->name('download');
    Route::get('showFile/{id}', [BlogController::class, 'showfile'])->name('showfile');
});
