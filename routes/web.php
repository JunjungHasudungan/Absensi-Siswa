<?php

use App\Http\Controllers\{
    ProfileController,
    HomeController,
};

use App\Http\Controllers\Admin\{
    SubjectController,
    ClassroomController,
};
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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route admin
Route::group(['middleware'  => 'role:admin', 'prefix' => 'admin',  'as' => 'admin.'], function(){
    Route::resources([
        'subjects'  => SubjectController::class,
        'classrooms'    => ClassroomController::class,
    ]);

});




require __DIR__.'/auth.php';
