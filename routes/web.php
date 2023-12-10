<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FamilyActionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMarriageController;
use App\Http\Controllers\BirthdayController;
use App\Http\Controllers\CoupleController;
use App\Http\Controllers\BackupController;

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

Route::get('/', [UserController::class, 'search']);

Auth::routes();

Route::controller(HomeController::class)->group(function () {
    Route::get('home', 'index')->name('home');
    Route::get('profile', 'index')->name('profile');
});

Route::controller(FamilyActionController::class)->group(function () {
    Route::post('family-actions/{user}/set-father', 'setFather')->name('family-actions.set-father');
    Route::post('family-actions/{user}/set-mother', 'setMother')->name('family-actions.set-mother');
    Route::post('family-actions/{user}/add-child', 'addChild')->name('family-actions.add-child');
    Route::post('family-actions/{user}/add-wife', 'addWife')->name('family-actions.add-wife');
    Route::post('family-actions/{user}/add-husband', 'addHusband')->name('family-actions.add-husband');
    Route::post('family-actions/{user}/set-parent', 'setParent')->name('family-actions.set-parent');
});

Route::controller(UserController::class)->group(function () {
    Route::get('profile-search', 'search')->name('users.search');
    Route::get('users/{user}', 'show')->name('users.show');
    Route::get('users/{user}/edit', 'edit')->name('users.edit');
    Route::patch('users/{user}', 'update')->name('users.update');
    Route::get('users/{user}/chart', 'chart')->name('users.chart');
    Route::get('users/{user}/tree', 'tree')->name('users.tree');
    Route::get('users/{user}/death', 'death')->name('users.death');
    Route::patch('users/{user}/photo-upload', 'photoUpload')->name('users.photo-upload');
    Route::delete('users/{user}', 'destroy')->name('users.destroy');
});

Route::get('users/{user}/marriages', [UserMarriageController::class, 'index'])->name('users.marriages');
Route::get('birthdays', [BirthdayController::class, 'index'])->name('birthdays.index');

/**
 * Couple/Marriages Routes
 */
Route::controller(CoupleController::class)->group(function () {
    Route::get('couples/{couple}', 'show')->name('couples.show');
    Route::get('couples/{couple}/edit', 'edit')->name('couples.edit');
    Route::patch('couples/{couple}', 'update')->name('couples.update');
});

Route::controller(ChangePasswordController::class)->middleware('auth')->group( function () {
    Route::get('password/change', 'show')->name('password_change');
    Route::post('password/change', 'update')->name('password_update');
});

/**
 * Admin only routes
 */
Route::group(['middleware' => 'admin'], function () {
    /**
     * Backup Restore Database Routes
     */
    Route::controller(BackupController::class)->group(function () {
        Route::post('backups/upload', 'upload')->name('backups.upload');
        Route::post('backups/{fileName}/restore', 'restore')->name('backups.restore');
        Route::get('backups/{fileName}/dl', 'download')->name('backups.download');
    });
    Route::resource('backups', BackupController::class);
});
